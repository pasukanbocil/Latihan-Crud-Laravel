@extends('layouts.main')

@section('title', 'Students')

@section('content')
<h2>Anda Sedang Melihat Detail Data Dari Siswa Yang Bernama {{$student->name}}</h2>
<div class="mt-5 mb-5">
    <table class="table table-bordered">
        <tr>
            <th>Nama</th>
            <th>NIS</th>
            <th>Jenis Kelamin</th>
            <th>Kelas</th>
            <th>Wali Kelas</th>
        </tr>
        <tr>
            <td>{{$student->name}}</td>
            <td>{{$student->nis}}</td>
            <td>
                @if ($student->gender== 'P')
                    Perempuan
                    @else
                    Laki-Laki
                @endif
            </td>
            <td>{{$student->class->name}}</td>
            <td>{{$student->class->walikelas->name}}</td>
        </tr>
      
    </table>
</div>
    <div>
        <h3>Extracurriculers</h3>
        <ol>
        @foreach ($student->extracurriculers as $item)
            <li>{{$item->name}}</li>
        @endforeach
        </ol>
    </div>
<style>
    th{
        width: 25%;
    }
</style>
@endsection