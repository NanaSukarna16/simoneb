<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profilUsaha;

class ProfilUsahaController extends Controller
{
    public $new_profil_usaha;
    public function __construct()
    {
        $this->new_profil_usaha = new profilUsaha();
    }
    public function index()
    {
        return view('profil_usaha.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profil_usaha.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $rules = [
            'user' => "required",
            'nama' => "required",
            'bidang' => "required",
            'status' => "required",
            'lama' => "required",
            'omset' => "required",
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong",
            'min' => ":attribute karakter terlalu pendek",
            'max' => ":attribute karakter terlalu panjang / ukuran terlalu besar",
            'mimes' => ":attribute Ektensi error, gunakan .png , .jpg dan .docx"
        ];

        $this->validate($request, $rules, $messages);

        $this->new_profil_usaha->nama = $request->nama;
        $this->new_profil_usaha->bidang = $request->bidang;
        $this->new_profil_usaha->status = $request->status;
        $this->new_profil_usaha->lama = $request->lama;
        $this->new_profil_usaha->omset = $request->omset;
        $this->new_profil_usaha->users_id = $request->user;

        $this->new_profil_usaha->save();
        return redirect()->route('profil-usaha')->with('status', 'Profil Usaha successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profil_usaha_edit = profilUsaha::find($id);

        return view('profil_usaha.edit', [
            'usaha' => $profil_usaha_edit
        ]);
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
        $usaha_edit = profilUsaha::find($id);
        $usaha_edit->nama = $request->nama;
        $usaha_edit->bidang = $request->bidang;
        $usaha_edit->status = $request->status;
        $usaha_edit->lama = $request->lama;
        $usaha_edit->omset = $request->omset;
        $usaha_edit->users_id = $request->user;

        $usaha_edit->save();
        return redirect()->route('profil-usaha')->with('status', 'Profil Usaha successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usaha_hapus = profilUsaha::findOrFail($id);
        $usaha_hapus->delete();
        return redirect()->route('profil-usaha')->with('status', 'Profil Usaha successfully deleted');
    }
}
