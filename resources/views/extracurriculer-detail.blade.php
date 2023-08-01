@extends('layouts.main')

@section('title', 'Extracurriculer')
@section('content')

<h2>Anda Sedang Melihat Detail Data Extracurriculer {{$eskul->name}}</h2>
<div class="mt-5">
    <h3>Daftar Siswa Extracurriculer</h3>
    <ol>
        @foreach ($eskul->students as $item)
            <li>{{$item->name}}</li>
        @endforeach
    </ol>
</div>
@endsection