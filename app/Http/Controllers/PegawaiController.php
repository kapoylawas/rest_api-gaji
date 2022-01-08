<?php

namespace App\Http\Controllers;

use App\Http\Resources\PegawaiResource;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Validator;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::paginate(5);
        return PegawaiResource::collection($pegawai);
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
            'name' => 'required|unique:pegawais|max:255',
        ],
        [
            'title.required' => 'Masukkan Title Post !',
            'content.required' => 'Masukkan Content Post !',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse('Validation Error', $validator->errors());
        }

        $post = Pegawai::create($input);

        if($post->save()){
                return new PegawaiResource($post);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return new PegawaiResource($pegawai);
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
        $pegawai = Pegawai::finOrFail($id);
        $pegawai->name = $request->name;
        if($pegawai->save()){
            return new PegawaiResource($pegawai);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        if($pegawai->delete()){
            return new PegawaiResource($pegawai);
        }
    }
}
