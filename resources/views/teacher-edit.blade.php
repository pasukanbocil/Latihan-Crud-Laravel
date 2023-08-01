@extends('layouts.main')

@section('title', 'Teacher | add new')

@section('content')


    <div class="mt-5 col-5 m-auto">
        <form action="/teacher/{{ $teacher->id }}" method="POST">
            @csrf
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="name">Name Guru</label>
                <input type="text" name="name" id="name" required class="form-control" value="{{ $teacher->name }}">
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </form>
    </div>
@endsection
