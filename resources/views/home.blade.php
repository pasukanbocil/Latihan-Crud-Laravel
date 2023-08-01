@extends('layouts.main')

@section('title', 'Home')

@section('content')
   <h1>Halaman Home</h1>
        <h2>Selamat Datang {{ $name }}, Anda Adalah {{ $role }}</h2>
     
@endsection