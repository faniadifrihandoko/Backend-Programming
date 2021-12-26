<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasien = Patients::all();
        $total = count($pasien);

        if($total){
            $data = [
                'message'=>'Semua data telah ditampilkan',
                'total'=>$total,
                'data'=>$pasien
            ];
            return response()->json($data, 200);
        }
        $data = [
            'message'=>'tidak ada data didalam tabel pasien'
        ];
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama'=>'required',
            'phone'=>'required|numeric',
            'alamat'=>'required',
            'status'=>'required',
            'in_date_at'=>'required',
            'out_date_at'=>'nullable'
        ]);
        $pasien = Patients::create($validasi);
        $data = [
            'message'=>'data berhasil dibuat',
            'data'=>$pasien
        ];
        return response()->json($data, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pasien = Patients::find($id);
        if($pasien){
            $data = [
                'message'=>'detail data berhasil ditampilkan',
                'data'=>$pasien
            ];
            return response()->json($data, 200);
        }
        $data = [
            'message'=>'data tidak ditemukan'
        ];
        return response()->json($data, 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pasien = Patients::find($id);
        if($pasien){
            $pasien->update($request->all());
            $data = [
                'message'=>'data berhasil diupdate',
                'data'=>$pasien
            ];
            return response()->json($data, 200);
        }
        $data = [
            'message'=>'data tidak bisa diupdate'
        ];
        return response()->json($data, 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasien = Patients::find($id);
        if($pasien){
            $pasien->delete();
            $data = [
                'message'=>'data berhasil dihapus',
                'data'=>$pasien
            ];
            return response()->json($data, 200);
        }
        $data = [
            'message'=>'data tidak bisa dihapus'
        ];
        return response()->json($data, 404);
    }

    public function search($name)
    {
        $pasien = Patients::where('nama', 'like', '%' . $name . '%')->get();

        $total = count($pasien);

        if ($total) {
            $data = [
                'message' => 'Mendapatkan data yang dicari',
                'total' => $total,
                'data' => $pasien
            ];

            return response()->json($data, 200);
        }
            $data = [
                'message' => 'Data tidak ditemukan'
            ];

            return response()->json($data, 404);
    }


    public function positive()
    {
        $pasien = Patients::where('status', 'positive')->get();
        $total = count($pasien);

        if ($total) {
            $data = [
                'message' => 'Mendapatkan data positive',
                'total patients' => $total,
                'data patients' => $pasien
            ];
            return response()->json($data, 200);
        }
            $data = [
                'message' => 'Data tidak ditemukan',
                'total patients' => $total
            ];
            return response()->json($data, 404);
    }

    public function  recovered()
    {
        $pasien = Patients::where('status', 'recovered')->get();
        $total = count($pasien);

        if ($total) {
            $data = [
                'message' => 'Mendapatkan data recovered',
                'total patients' => $total,
                'data patients' => $pasien
            ];
            return response()->json($data, 200);
        }
            $data = [
                'message' => 'Data tidak ditemukan',
                'total patients' => $total
            ];
            return response()->json($data, 404);
    }

    public function dead()
    {
        $pasien = Patients::where('status', 'dead')->get();
        $total = count($pasien);

        if ($total) {
            $data = [
                'message' => 'Mendapatkan data dead',
                'total patients' => $total,
                'data patients' => $pasien
            ];
            return response()->json($data, 200);
        }
            $data = [
                'message' => 'Data tidak ditemukan',
                'total patients' => $total
            ];
            return response()->json($data, 404);
    }
}
