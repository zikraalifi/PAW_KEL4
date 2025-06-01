<!-- resources/views/mahasiswa/dokter.blade.php -->
@extends('layouts.app')

@section('content')
    <h2>Daftar Dokter</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Spesialis</th>
            </tr>
        </thead>
        <tbody>
            @foreach($doctors as $doctor)
            <tr>
                <td>{{ $doctor->name }}</td>
                <td>{{ $doctor->specialization }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
