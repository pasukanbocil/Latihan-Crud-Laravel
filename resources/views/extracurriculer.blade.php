@extends('layouts.main')

@section('title', 'Extracurriculer')
@section('content')
    <h1>Ini Halaman Extracurriculer</h1>
    <div class="my-5 d-flex justify-content-between">
        <a href="/eskul-add" class="btn btn-primary">Add Data</a>
        <a href="/extracurriculer-deleted" class="btn btn-info">Lihat Data Yang Telah dihapus!</a>
    </div>
    @if (Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif
    <table class="table">
        <tr>
            <th>NO.</th>
            <th>Nama Extracurriculer</th>
            <th>Action</th>
        </tr>
        @foreach ($eskulList as $el)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $el->name }}</td>
                <td><a href="extracurriculer-detail/{{ $el->id }}">Detail</a>
                    <a href="extracurriculer-edit/{{ $el->id }}">Edit</a>
                    <a href="extracurriculer-delete/{{ $el->id }}">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="my-5">
        {{ $eskulList->links() }}
    </div>
@endsection
