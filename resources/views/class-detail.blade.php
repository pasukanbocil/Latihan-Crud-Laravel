@extends('layouts.main')

@section('title', 'Students')

@section('content')

<h2>Anda Sedang Melihat Detail Data Dari Kelas {{$class->name}}</h2>

<div class="mt-5">
    <h4>Wali Kelas : {{$class->walikelas->name}}</h4>
</div>
<div class="mt-5">
    <h4>Daftar Siswa</h4>
    <ol>
        @foreach ($class->students as $item)
            <li>{{$item->name}}</li>
        @endforeach
    </ol>
</div>
@endsection