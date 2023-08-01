<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Extracurriculer;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ExtracurriculerCreateRequest;

use function Ramsey\Uuid\v1;

class ExtracurriculerController extends Controller
{
    public function index()
    {
        $eskul = Extracurriculer::paginate(5);
        return view('extracurriculer', ['eskulList' => $eskul]);
    }

    public function show($id)
    {
        $eskul = Extracurriculer::with(['students'])->findOrFail($id);
        return view('extracurriculer-detail', ['eskul' => $eskul]);
    }

    public function create()
    {
        return view('eskul-add');
    }

    public function store(ExtracurriculerCreateRequest $request)
    {
        $extracuriculer = Extracurriculer::create($request->all());
        if ($extracuriculer) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil ditambahkan!');
        }
        return redirect('/extracurriculer');
    }
    public function edit(Request $request, $id)
    {
        $eskul = Extracurriculer::findOrFail($id);
        return view('extracurriculer-edit', ['eskul' => $eskul]);
    }
    public function update(Request $request, $id)
    {
        $eskul = Extracurriculer::findOrFail($id);
        $eskul->update($request->all());
        if ($eskul) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil diubah!');
        }
        return redirect('/extracurriculer');
    }
    public function delete($id)
    {
        $eskul = Extracurriculer::findOrFail($id);
        return view('extracurriculer-delete', ['eskul' => $eskul]);
    }

    public function destroy($id)
    {
        $eskuldeleted = Extracurriculer::findOrFail($id);
        $eskuldeleted->delete();
        if ($eskuldeleted) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil dihapus!');
        }
        return redirect('/extracurriculer');
    }
    public function deletedExtracurriculer()
    {
        $eskuldeleted = Extracurriculer::onlyTrashed()->get();
        return view('extracurriculer-deleted-list', ['eskulDeleted' => $eskuldeleted]);
    }
    public function restore($id)
    {
        $extracurriculerdeleted = Extracurriculer::onlyTrashed()->where('id', $id)->restore();
        if ($extracurriculerdeleted) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil direstore!');
        }
        return redirect('/extracurriculer');
    }
}
