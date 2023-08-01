@extends('layouts.main')

@section('title', 'Students')

@section('content')
    <h1>Data Terhapus</h1>
    <div class="mt-5">
        <a href="/students" class="btn btn-primary">Kembali</a>
    </div>
    <div class="mt-5">
        <table class="table">
            <tr>
                <th>NO.</th>
                <th>Nama</th>
                <th>NIS</th>
                <th>Jenis Kelamin</th>
                <th>Action</th>
            </tr>
            <tbody>
                @foreach ($student as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->nis }}</td>
                        <td>{{ $item->gender }}</td>
                        <td>
                            <a href="/student/{{ $item->id }}/restore">Restore</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
