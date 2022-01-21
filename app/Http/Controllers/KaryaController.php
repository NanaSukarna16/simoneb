<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use App\Models\Semester;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class KaryaController extends Controller
{
    public $new_karya;
    public function __construct()
    {
        $this->new_karya = new Karya();
    }
    public function index()
    {
        return view('karya.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Semester::all();

        $data2 = DB::select("SELECT * FROM users WHERE role ='mahasiswa' ORDER BY name");
        return view('karya.create', [
            'semester' => $data, 'user' => $data2
        ]);
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
            'semester_id' => "required",
            'judul' => "required",
            'tanggal' => "required",
            'media' => "required",
            'link' => "required",
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong",
            'min' => ":attribute karakter terlalu pendek",
            'max' => ":attribute karakter terlalu panjang / ukuran terlalu besar",
            'mimes' => ":attribute Ektensi error, gunakan .png , .jpg dan .docx"
        ];

        $this->validate($request, $rules, $messages);

        $this->new_karya->judul = $request->judul;
        $this->new_karya->tgl = $request->tanggal;
        $this->new_karya->media = $request->media;
        $this->new_karya->link = $request->link;
        $this->new_karya->semester_id = $request->semester_id;
        $this->new_karya->users_id = $request->user;

        $this->new_karya->save();
        return redirect()->route('karya')->with('status', 'Karya successfully created');
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
        $data = Semester::all();

        $karya_edit = Karya::find($id);

        $data2 = DB::select("SELECT * FROM users WHERE role ='mahasiswa' ORDER BY name ");
        return view('karya.edit', [
            'semester' => $data, 'user' => $data2, 'karya' => $karya_edit
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
        $rules = [
            'tanggal' => "required"
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong",
        ];

        $this->validate($request, $rules, $messages);
        $karya_edit = Karya::find($id);
        $karya_edit->judul = $request->judul;
        $karya_edit->tgl = $request->tanggal;
        $karya_edit->media = $request->media;
        $karya_edit->link = $request->link;
        $karya_edit->semester_id = $request->semester_id;
        $karya_edit->users_id = $request->user;


        $karya_edit->save();
        return redirect()->route('karya')->with('status', 'Karya successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $karya_hapus = Karya::findOrFail($id);
        $karya_hapus->delete();
        return redirect()->route('karya')->with('status', 'Karya successfully deleted');
    }
}
