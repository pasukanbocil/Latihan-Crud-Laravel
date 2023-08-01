@extends('layouts.main')

@section('title', 'Teacher | add new')

@section('content')

    <div class="mt-5 col-5 m-auto">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="teacher" method="post">
            @csrf
            <div class="mb-3">
                <label for="name">Name Guru</label>
            <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
    </div>

@endsection
