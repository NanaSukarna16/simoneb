<?php

namespace App\Http\Controllers;

use App\Models\Pewancara;
use Illuminate\Http\Request;

class PewancaraController extends Controller
{
    public $new_pewancara;
    public function __construct()
    {
        $this->new_pewancara = new Pewancara();
    }
    public function index()
    {
        // menghitung total data
        $jumlah = Pewancara::count();

        // buat paginition
        $batas = 6;

        // Tangkap request nama
        $tangkap = request()->cari;

        // query tampil berdasarkan request nama;
        $data = Pewancara::where('nama', 'LIKE', "%$tangkap%")->orderBy('id', 'DESC')->simplePaginate($batas);

        // urutkan nomor sesuai total data
        $no = $batas * ($data->currentPage() - 1);

        return view('pewancara.index', [
            'pewancara' => $data, 'total' => $jumlah, 'no' => $no
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pewancara.create');
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
            'nama' => "required"
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong",
            'mimes' => ":attribute Ektensi error, gunakan .png , .jpg, .jpeg dan .pdf"
        ];

        $this->validate($request, $rules, $messages);

        $this->new_pewancara->nama = $request->nama;

        $this->new_pewancara->save();
        return redirect()->route('pewancara')->with('status', 'Pewancara successfully created');
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
        // dapatkan data berdasarkan id kategori
        $pewancara_edit = Pewancara::find($id);

        return view('pewancara.edit', [
            'pewancara' => $pewancara_edit
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
        $pewancara_edit = Pewancara::find($id);
        $pewancara_edit->nama = $request->nama;
        $pewancara_edit->save();
        return redirect()->route('pewancara')->with('status', 'Pewancara successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pewancara_hapus = Pewancara::findOrFail($id);
        $pewancara_hapus->delete();
        return redirect()->route('pewancara')->with('status', 'Pewancara successfully deleted');
    }
}
