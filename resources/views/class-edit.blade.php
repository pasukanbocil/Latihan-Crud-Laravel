@extends('layouts.main')

@section('title', 'Class | Edit Guru')

@section('content')
    <div class="mt-5 col-5 m-auto">
        <form action="/class/{{ $class->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name">Name Kelas</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $class->name }}" required>
            </div>
            <div class="mb-3">
                <label for="teacher">Wali Kelas</label>
                <select name="teacher_id" id="teacher_id" class="form-control" required>
                    <option value="{{ $class->walikelas->id }}">{{ $class->walikelas->name }}</option>
                    @foreach ($teacher as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <button class="btn btn-success" type="submit">Update</button>
            </div>
        </form>
    </div>

@endsection
