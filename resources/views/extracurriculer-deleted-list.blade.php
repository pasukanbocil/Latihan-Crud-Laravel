@extends('layouts.main')

@section('title', 'Class')

@section('content')
    <h1>Data Terhapus</h1>
    <div class="mt-5">
        <a href="/extracurriculer" class="btn btn-primary">Kembali</a>
    </div>
    <div class="mt-5">
        <table class="table">
            <tr>
                <th>NO.</th>
                <th>Nama</th>
                <th>Action</th>
            </tr>
            <tbody>
                @foreach ($eskulDeleted as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <a href="/extracurriculer/{{ $item->id }}/restore">Restore</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
