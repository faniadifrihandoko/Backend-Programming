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
    function store(Request $request)
    {
        $student = Student::create ([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ]);

        $data = [
            'message' => 'Student is created',
            'data' => $student
        ];

        return response()->json($data, 201);
    }

    // membuat function show
    function show($id)
    {
        $student = Student::find($id);

        if ($student) {
            $data = [
                'message' => 'Get Detail Students',
                'data' => $student
            ];


            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data not Found'
            ];

            return response()->json($data, 404);
        }
    }

    function update(Request $request, $id)
    {
        $student = Student::find($id);

        if ($student) {
            $student->update([
                'nama' => $request->nama ?? $student->nama,
                'nim' => $request->nim ?? $student->nim,
                'email' => $request->email ?? $student->email,
                'jurusan' => $request->jurusan ?? $student->email
            ]);

            $data = [
                'message' => 'Data is Updated',
                'data' => $student
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data not Found'
            ];

            return response()->json($data, 404);
        }
    }

    function destroy($id)
    {
        $student = Student::find($id);

        if ($student) {
            $student->delete();

            $data = [
                'message' => 'Student is Deleted'
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data not Found'
            ];

            return response()->json($data, 404);
        }
    }
}