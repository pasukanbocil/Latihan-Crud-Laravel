@extends('layouts.main')

@section('title', 'Class | add new')

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


        <form action="class" method="post">
            @csrf
            <div class="mb-3">
                <label for="name">Name Kelas</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="teacher">Wali Kelas</label>
                <select name="teacher_id" id="teacher_id" class="form-control">
                    <option value="">Select One</option>
                    @foreach ($teacher as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <button class="btn btn-success" type="submit">Save</button>
            </div>
        </form>
    </div>
@endsection
