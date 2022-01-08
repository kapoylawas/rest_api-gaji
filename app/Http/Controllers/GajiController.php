<?php

namespace App\Http\Controllers;

use App\Http\Resources\GajiResource;
use App\Models\Gaji;
use Illuminate\Http\Request;
use Validator;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gaji = Gaji::paginate(5);
        return GajiResource::collection($gaji);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name_karyawan' => 'required',
            'gaji_karyawan' => 'required',
            'tanggal' => 'required',
        ],
        [
            'name_karyawan.required' => 'Masukkan Nama Post !',
            'gaji_karyawan.required' => 'Masukkan Gaji Post !',
            'tanggal.required' => 'Masukkan Tanggal Post !',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse('Validation Error', $validator->errors());
        }

        $post = Gaji::create($input);

        if($post->save()){
                return new GajiResource($post);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($tanggal)
    {
        $gaji = Gaji::findOrFail($tanggal);
        return new GajiResource($gaji);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
