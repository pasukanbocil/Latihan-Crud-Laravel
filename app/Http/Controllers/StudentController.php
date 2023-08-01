<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StudentCreateRequest;
use App\Models\Extracurriculer;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::paginate(5);

        return view('student', ['studentsList' => $students]);


        // query builder

        // $student = DB::table('students')->get();
        // $student = DB::table('students')->insert(
        //     [
        //         'name' => 'RIZKY FIRMANSYAH',
        //         'nis' => '20110130',
        //         'gender' => 'L',
        //         'class_id' => 1
        //     ]
        // );
        // DB::table('students')->where('id', 29)->update([
        //     'name' => 'APA IYA DEK',
        //     'nis' => '20110132',
        //     'gender' => 'L',
        //     'class_id' => 2
        // ]);
        // DB::table('students')->where('id', 29)->delete();


        // elequent
        // $student = Student::all();
        // Student::create([
        //     'name' => 'AZZAHRA PUTRI',
        //     'nis' => '20110131',
        //     'gender' => 'P',
        //     'class_id' => 3
        // ]);
        // dd($student);
        // Student::find(29)->update([
        //     'name' => 'APA IYA MELI ',
        //     'class_id' => 1
        // ]);
        // Student::find(27)->delete();



        // method collections dengan php biasa
        // hitung jumlah nilai
        // jitung berapa banyak nilai
        // rata rata nilai


        // $nilai = [9, 8, 7, 6, 4, 8, 9, 1, 10, 3, 9, 7, 1, 5, 3, 9];

        // filter 

        // $aaa = collect($nilai)->filter(function ($value) {
        //     return $value > 7;
        // });


        // contains = cek apakah array memiliki sebuah sesuatu

        // $aaa = collect($nilai)->contains(function ($value) {
        //     return $value > 9;
        // });
        // dd($aaa);

        // method diff

        // $restaurantA = ["burger", "siomay", "pizza", "spaghetti", "makaroni", "martabak", "bakso"];
        // $restaurantB = ["pizza", "fried chicken", "martabak", "sayur asem", "pecel lele", "bakso"];

        // $menurestoA = collect($restaurantA)->diff($restaurantB);
        // $menurestoB = collect($restaurantB)->diff($restaurantA);
        // dd($menurestoB);

        // method pluk

        // $bioadata = [
        //     ['nama' => 'dicky', 'umur' => 22],
        //     ['nama' => 'meli', 'umur' => 21],
        //     ['nama' => 'fakhri', 'umur' => 21],
        //     ['nama' => 'farhan', 'umur' => 21]
        // ];

        // $aaa = collect($bioadata)->pluck('nama')->all();
        // dd($aaa);

        // method map

        //     $aaa = collect($nilai)->map(function ($value) {
        //         return $value * 2;
        //     })->all();
        //     dd($aaa);
        // }
    }
    public function show($id)
    {
        $student = Student::with(['class.walikelas', 'extracurriculers'])->findOrFail($id);
        return view('student-detail', ['student' => $student]);
    }

    public function create()
    {
        $class = ClassRoom::select('id', 'name')->get();
        return view('student-add', ['class' => $class]);
    }
    public function store(StudentCreateRequest $request)
    {
        // $student = new Student;
        // $student->name = $request->name;
        // $student->nis = $request->nis;
        // $student->gender = $request->gender;
        // $student->class_id = $request->class_id;
        // $student->save();
        // validatiob form


        $student = Student::create($request->all());

        // 
        // session flash
        if ($student) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil ditambahkan!');
        }
        // 
        return redirect('/students');
    }

    public function edit(Request $request, $id)
    {
        $student = Student::with('class')->findOrFail($id);
        $class = ClassRoom::where('id', '!=', $student->class_id)->get(['id', 'name']);
        return view('student-edit', ['student' => $student, 'class' => $class]);
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        // $student->name = $request->name;
        // $student->nis = $request->nis;
        // $student->gender = $request->gender;
        // $student->class_id = $request->class_id;
        // $student->save();

        $student->update($request->all()); //mass assigment 
        if ($student) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil diubah!');
        }
        return redirect('/students');
    }

    public function delete($id)
    {
        $student = Student::findOrFail($id);
        return view('student-delete', ['student' => $student]);
    }
    public function destroy($id)
    {
        $deletedstudent = Student::findOrFail($id);
        $deletedstudent->delete();


        if ($deletedstudent) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil dihapus!');
        }
        return redirect('/students');
    }
    public function deletedStudent()
    {
        $deletedStudent = Student::onlyTrashed()->get();

        return view('student-deleted-list', ['student' => $deletedStudent]);
    }
    public function restore($id)
    {
        $deletedStudent = Student::withTrashed()->where('id', $id)->restore();
        if ($deletedStudent) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil direstore!');
        }

        return redirect('/students');
    }
}
