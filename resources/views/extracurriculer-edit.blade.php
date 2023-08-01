@extends('layouts.main')

@section('title', 'Edit Extracurriculer')
@section('content')
    <div class="mt-5 col-5 m-auto">
        <form action="/extracurriculer/{{ $eskul->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="">Nama Extracurriculer</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $eskul->name }}" required>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </form>
    </div>

@endsection
