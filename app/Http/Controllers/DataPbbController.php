<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DataPbb;
use Illuminate\Http\Request;

class DataPbbController extends Controller {

    public function index() {
        $data = DataPbb::all();

        return response()->json([
            'Status' => 'True',
            'ErrorCode' => "-",
            'ErrorDescription' => "-",
            'Data' => $data
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'tahun' => 'required|date_format:Y',
            'pajak' => 'required|numeric',
            'denda' => 'required|numeric',
            'objek_pbb' => 'required'
        ]);

        try {
            DataPbb::create([
                'tahun' => $request->tahun,
                'pajak' => $request->pajak,
                'denda' => $request->denda,
                'objek_pbb_id' => $request->objek_pbb
            ]);

            return response()->json([
                'Status' => 'True',
                'ErrorCode' => '201',
                'ErrorDescription' => 'Created'
            ], 201);
        }
        catch (\Exception $e) {
            return response()->json([
                'Status' => 'False',
                'ErrorCode' => '409',
                'ErrorDescription' => $e->errorInfo,
            ], 409);
        }
    }
}
