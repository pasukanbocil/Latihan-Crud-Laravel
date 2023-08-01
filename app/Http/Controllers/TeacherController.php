<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\TeacherrCreateRequest;

class TeacherController extends Controller
{
    public function index()
    {
        $teacher = Teacher::paginate(5);

        return view('teacher', ['teacherList' => $teacher]);
    }
    public function show($id)
    {
        $teacher = Teacher::with(['class.students'])->findOrFail($id);

        return view('teacher-detail', ['teacher' => $teacher]);
    }
    public function create()
    {
        return view('teacher-add');
    }

    public function store(TeacherrCreateRequest $request)
    {
        $teacher = Teacher::create($request->all());
        if ($teacher) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil ditambahkan!');
        }
        return redirect('/teacher');
    }
    public function edit(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        return view('teacher-edit', ['teacher' => $teacher]);
    }
    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->update($request->all());
        if ($teacher) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil diubah!');
        }
        return redirect('/teacher');
    }
    public function delete($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teacher-delete', ['teacher' => $teacher]);
    }
    public function destroy($id)
    {
        $deletedteacher = Teacher::findOrFail($id);
        $deletedteacher->delete();
        if ($deletedteacher) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil dihapus!');
        }
        return redirect('/teacher');
    }
    public function deletedTeacher()
    {
        $deletedTeacher = Teacher::onlyTrashed()->get();
        return view('teacher-deleted-list', ['deletedTeacher' => $deletedTeacher]);
    }
    public function restore($id)
    {
        $deletedTeacher = Teacher::onlyTrashed()->where('id', $id)->restore();
        if ($deletedTeacher) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil direstore!');
        }
        return redirect('/teacher');
    }
}
