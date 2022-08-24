<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\KaryawanResource;

use App\Models\Karyawan;

class KaryawanController extends Controller
{
    public function index()
    {
        $data = KaryawanResource::collection(Karyawan::all());

        $message = [
            'success' => true,
            'message' => 'Data karyawan',
            'data' => $data,
        ];
        
        return response()->json($message, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nip' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required',
            'gaji_pokok' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $karyawan = Karyawan::create($request->all());

        $message = [
            'success' => true,
            'message' => 'Simpan data karyawan',
            'data' => $karyawan,
        ];

        return response()->json($message, 200);
    }

    public function show($id)
    {
        $data = new KaryawanResource(Karyawan::findOrFail($id));
        
        $message = [
            'success' => true,
            'message' => 'Data detail karyawan',
            'data' => $data,
        ];
        
        return response()->json($message, 200);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nip' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required',
            'gaji_pokok' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $karyawan = Karyawan::find($id);
        $karyawan->update($request->all());

        $message = [
            'success' => true,
            'message' => 'Update data karyawan',
            'data' => $karyawan,
        ];

        return response()->json($message, 200);
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();
        
        $message = [
            'success' => true,
            'message' => 'Hapus karyawan',
            'data' => $karyawan,
        ];
        
        return response()->json($message, 200);
    }
}
