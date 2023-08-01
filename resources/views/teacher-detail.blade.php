@extends('layouts.main')

@section('title', 'Teacher')

@section('content')
<h2>Anda Sedang Melihat Detail Data Dari Guru Yang Bernama {{$teacher->name}}</h2>
<div class="mt-5">
    <h3>
        Kelas :
        @if ($teacher->class)
            {{$teacher->class->name}}
        @else
        -
        @endif
    </h3>
</div>
    <div class="mt-5">
        <h3>Data Siswa Di Kelas</h3>
        @if ($teacher->class)
            <ol>
                @foreach ($teacher->class->students as $item)
                    <li>{{$item->name}}</li>
                @endforeach
            </ol>
        @endif
           
    </div>

    <div class="mt-5">
        <a href="/teacher" class="btn btn-primary">Kembali</a>
    </div>
@endsection