<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ClassCreateRequest;

class ClassController extends Controller
{
    public function index()
    {
        // laazy load
        // $class = ClassRoom::all(); // cara requestv data
        // select * from tabel class
        // select * from tabel student where class_id = 1
        // select * from tabel student where class_id = 2
        // select * from tabel student where class_id = 3
        // select * from tabel student where class_id = 4

        // eager load
        $class = ClassRoom::paginate(5);  // cara request data
        // select * from tabel class
        // select * from tabels student where class_id in (1,2,3,4)

        return view('classroom', ['classList' => $class]);
    }

    public function show($id)
    {
        $class = ClassRoom::with(['students', 'walikelas'])->findOrFail($id);
        return view('class-detail', ['class' => $class]);
    }
    public function create()
    {
        $teacher = Teacher::select('id', 'name')->get();
        return view('class-add', ['teacher' => $teacher]);
    }
    public function store(ClassCreateRequest $request)
    {
        $class = ClassRoom::create($request->all());
        if ($class) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil ditambahkan!');
        }
        return redirect('/class');
    }
    public function edit(Request $request, $id)
    {
        $class = ClassRoom::with('walikelas')->findOrFail($id);
        $teacher = Teacher::where('id', '!=', $class->teacher_id)->get(['id', 'name']);

        return view('class-edit', ['class' => $class, 'teacher' => $teacher]);
    }
    public function update(Request $request, $id)
    {
        $class = ClassRoom::findOrFail($id);
        $class->update($request->all());
        if ($class) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil diubah!');
        }
        return redirect('/class');
    }
    public function delete($id)
    {
        $class = ClassRoom::findOrFail($id);
        return view('class-delete', ['class' => $class]);
    }
    public function destroy($id)
    {
        $deletedclass = ClassRoom::findOrFail($id);
        $deletedclass->delete();
        if ($deletedclass) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil dihapus!');
        }
        return redirect('/class');
    }
    public function deletedClass()
    {
        $deletedclass = ClassRoom::onlyTrashed()->get();
        return view('class-deleted-list', ['deletedClass' => $deletedclass]);
    }
    public function restore($id)
    {
        $deletedclass = ClassRoom::onlyTrashed()->where('id', $id)->restore();
        if ($deletedclass) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil direstore!');
        }

        return redirect('/class');
    }
}
