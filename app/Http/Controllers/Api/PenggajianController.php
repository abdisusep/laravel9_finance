<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Resources\PenggajianResource;

use App\Models\Karyawan;
use App\Models\Penggajian;

class PenggajianController extends Controller
{
    public function index()
    {
        $data = PenggajianResource::collection(Penggajian::all());

        $message = [
            'success' => true,
            'message' => 'Data penggajian',
            'data' => $data,
        ];
        
        return response()->json($message, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'karyawan_id' => 'required',
            'bonus' => 'required',
            'potongan' => 'required',
            'keterangan' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $karyawan = Karyawan::find($request->karyawan_id);
        $penggajian = Penggajian::create([
            'karyawan_id' => $request->karyawan_id,
            'bonus' => $request->bonus,
            'potongan' => $request->potongan,
            'total' => $karyawan->gaji_pokok + $request->bonus - $request->potongan,
            'tanggal' => date('Y-m-d'),
            'keterangan' => $request->keterangan,
        ]);

        $message = [
            'success' => true,
            'message' => 'Simpan data penggajian',
            'data' => $penggajian,
        ];

        return response()->json($message, 200);
    }

    public function show($id)
    {
        $data = PenggajianResource::collection(Penggajian::where('karyawan_id', $id)->orderBy('tanggal', 'DESC')->get());
        
        $message = [
            'success' => true,
            'message' => 'Data penggajian per karyawan',
            'data' => $data,
        ];
        
        return response()->json($message, 200);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'bonus' => 'required',
            'potongan' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $penggajian = Penggajian::find($id);
        $penggajian->update([
            'bonus' => $request->bonus,
            'potongan' => $request->potongan,
            'total' => $penggajian->karyawan->gaji_pokok + $request->bonus - $request->potongan,
            'keterangan' => $request->keterangan,
        ]);

        $message = [
            'success' => true,
            'message' => 'Update data penggajian',
            'data' => $penggajian,
        ];

        return response()->json($message, 200);
    }

    public function destroy($id)
    {
        $penggajian = Penggajian::findOrFail($id);
        $penggajian->delete();
        
        $message = [
            'success' => true,
            'message' => 'Hapus penggajian',
            'data' => $penggajian,
        ];
        
        return response()->json($message, 200);
    }
}
