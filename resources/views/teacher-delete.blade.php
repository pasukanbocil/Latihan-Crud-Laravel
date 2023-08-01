@extends('layouts.main')

@section('title', 'Teacher')

@section('content')

    <div class="mt-5">

        <h2>Apakah Yakin Ingin Hapus Data: {{ $teacher->name }} </h2>
        <form style="display: inline-block" action="/teacher-destroy/{{ $teacher->id }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <a href="/teacher" class="btn btn-primary">Cancel</a>
    </div>
@endsection
