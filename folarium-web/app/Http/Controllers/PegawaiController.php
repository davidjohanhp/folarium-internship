<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seluruhpegawai = Pegawai::orderBy('id','desc')->paginate(5);
        return view('pegawai_index', compact('seluruhpegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        Pegawai::create($request->post());

        return redirect()->route('seluruhpegawai.index')->with('success','Pegawai has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        return view('pegawai_show',compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {

        return view('pegawai_edit',compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $pegawai->fill($request->post())->save();

        return redirect()->route('seluruhpegawai.index')->with('success','Pegawai Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->route('seluruhpegawai.index')->with('success','Pegawai has been deleted successfully');
    }
}
