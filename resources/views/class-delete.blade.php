@extends('layouts.main')

@section('title', 'Class')

@section('content')
    <div class="mt-5">

        <h2>Apakah Yakin Ingin Hapus Data: {{ $class->name }}</h2>
        <form style="display: inline-block" action="/class-destroy/{{ $class->id }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <a href="/students" class="btn btn-primary">Cancel</a>
    </div>

@endsection
