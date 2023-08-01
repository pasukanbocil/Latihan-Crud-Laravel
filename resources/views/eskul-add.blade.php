@extends('layouts.main')

@section('title', 'Add Extracurriculer')
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
        <form action="eskul" method="post">
            @csrf
            <div class="mb-3">
                <label for="">Nama Extracurriculer</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
    </div>

@endsection
