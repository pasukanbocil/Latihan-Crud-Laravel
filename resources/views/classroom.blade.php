@extends('layouts.main')

@section('title', 'Class')

@section('content')
    <h1>Ini Halaman Class</h1>
    <div class="my-5 d-flex justify-content-between">
        <a href="/class-add" class="btn btn-primary">Add Data</a>
        <a href="/class-deleted" class="btn btn-info">Lihat Data Yang Telah dihapus!</a>
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
        @foreach ($classList as $cl)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $cl->name }}</td>
                <td><a href="class-detail/{{ $cl->id }}">Detail</a>
                    <a href="class-edit/{{ $cl->id }}">Edit</a>
                    <a href="class-delete/{{ $cl->id }}">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="my-5">
        {{ $classList->links() }}
    </div>
@endsection
