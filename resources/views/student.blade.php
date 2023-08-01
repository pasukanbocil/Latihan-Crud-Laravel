@extends('layouts.main')

@section('title', 'Students')

@section('content')
    <h1>Ini Halaman Student</h1>

    <div class="my-5 d-flex justify-content-between">
        <a href="/student-add" class="btn btn-primary">Add Data</a>
        <a href="/student-deleted" class="btn btn-info">Lihat Data Yang Telah dihapus!</a>
    </div>
    @if (Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif
    <table class="table">
        <tr>
            <th>NO.</th>
            <th>Nama</th>
            <th>NIS</th>
            <th>Jenis Kelamin</th>
            <th>Action</th>
        </tr>
        @foreach ($studentsList as $sl)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $sl->name }}</td>
                <td>{{ $sl->nis }}</td>
                <td>{{ $sl->gender }}</td>
                <td><a href="student/{{ $sl->id }}">Detail</a>
                    <a href="student-edit/{{ $sl->id }}">Edit</a>
                    <a href="student-delete/{{ $sl->id }}">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="my-5">
        {{ $studentsList->links() }}
    </div>
@endsection
