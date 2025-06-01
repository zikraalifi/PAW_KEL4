<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class MahasiswaController extends Controller
{
    // Menampilkan daftar dokter (readonly untuk mahasiswa)
    public function indexDokter()
    {
        $doctors = Doctor::all();
        return view('mahasiswa.dokter', compact('doctors'));
    }
}
