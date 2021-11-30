<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ObjekPbb;
use App\Models\UsersObjekPbb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ObjekPbbController extends Controller {

    public function index() {
        $data = ObjekPbb::with('dataPbb')
            ->join('users_objek_pbb', 'users_objek_pbb.objek_pbb_id', 'objek_pbb.id')
            ->where('users_objek_pbb.user_id', Auth::user()->id)
            ->get();

        return response()->json([
            'Status' => 'True',
            'ErrorCode' => "-",
            'ErrorDescription' => "-",
            'Data' => $data
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'nop_pbb' => 'required|unique:objek_pbb,nop_pbb',
            'nama' => 'required',
            'alamat' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'rw' => 'required',
            'rt' => 'required',
        ]);

        try {
            $objek_pbb = ObjekPbb::create([
                'nop_pbb' => $request->nop_pbb,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'kabupaten' => $request->kabupaten,
                'kecamatan' => $request->kecamatan,
                'desa' => $request->desa,
                'rw' => $request->rw,
                'rt' => $request->rt
            ]);

            UsersObjekPbb::create([
                'user_id' => Auth::user()->id,
                'objek_pbb_id' => $objek_pbb->id
            ]);

            return response()->json([
                'Status' => 'True',
                'ErrorCode' => "201",
                'ErrorDescription' => "Created",
            ], 201);
        }
        catch(\Exception $e) {
            return response()->json([
                'Status' => 'False',
                'ErrorCode' => '409',
                'ErrorDescription' => $e->errorInfo,
            ], 409);
        }
    }
}
