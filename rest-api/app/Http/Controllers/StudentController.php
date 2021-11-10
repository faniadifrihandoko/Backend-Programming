<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    // membuat function index
    public function index() {

        // menggunakan model student untuk select data
        $student = Student::all();

        $data = [
            'message' => 'Get all student',
            'data' => $student
        ];

        // mengirim data (json) dan kode 200
        return response()->json($data, 200);
    }

    // membuat function store
    public function store(Request $request) {

        // menangkap data request
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];

        // menggunakan model student untuk input data
        $student = Student::create($input);

        $data = [
            'message' => 'Student is created succesfully',
            'data' => $student
        ];

        // mengembalikan data (json) dan kode 201
        return response()->json($data, 201);
    }
}