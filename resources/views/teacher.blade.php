@extends('layouts.main')

@section('title', 'Teacher')

@section('content')
    <h1>Ini Halaman Teacher</h1>
    <div class="my-5 d-flex justify-content-between">
        <a href="/teacher-add" class="btn btn-primary">Add Data</a>
        <a href="/teacher-deleted" class="btn btn-info">Lihat Data Yang Telah dihapus!</a>
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
            <th>Action</th>
        </tr>
        @foreach ($teacherList as $tl)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $tl->name }}</td>
                <td><a href="teacher-detail/{{ $tl->id }}">Detail</a>
                    <a href="teacher-edit/{{ $tl->id }}">Edit</a>
                    <a href="teacher-delete/{{ $tl->id }}">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="my-5">
        {{ $teacherList->links() }}
    </div>
@endsection
