<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keuangan;

class KeuanganController extends Controller
{
    public $new_keuangan;
    public function __construct()
    {
        $this->new_keuangan = new Keuangan();
    }
    public function index()
    {

        return view('keuangan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('keuangan.create');
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
            'file' => "required|mimes:pptx,docx,xlsx|"
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong",
            'min' => ":attribute karakter terlalu pendek",
            'max' => ":attribute karakter terlalu panjang / ukuran terlalu besar",
            'mimes' => ":attribute Ektensi error, gunakan .pptx atau .docx dan .xlsx"
        ];

        $this->validate($request, $rules, $messages);
        $nm = $request->file;

        $namaFile = $nm->getClientOriginalName();

        $this->new_keuangan->file = $namaFile;
        $this->new_keuangan->users_id = $request->user;


        $nm->move(public_path() . '/storage/keuangan', $namaFile);
        $this->new_keuangan->save();

        // dd($request->all());

        return redirect()->route('keuangan')->with('status', 'Laporan Keuangan Usaha successfully created');
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
        $keuangan_edit = Keuangan::find($id);

        return view('keuangan.edit', [
           'keuangan' => $keuangan_edit
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
            'file' => "required|mimes:pptx,docx,xlsx|"
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong",
            'min' => ":attribute karakter terlalu pendek",
            'max' => ":attribute karakter terlalu panjang / ukuran terlalu besar",
            'mimes' => ":attribute Ektensi error, gunakan .pptx atau .docx dan .xlsx"
        ];

        $keuangan_edit = Keuangan::find($id);
        $fileLama = $keuangan_edit->file;

        if (!$request->file) {
            $keuangan_edit->file = $fileLama;
        } else {

            if ($request->file != $fileLama) {
                $nm = $request->file;

                $namaFile = $nm->getClientOriginalName();
                $keuangan_edit->file = $namaFile;

                $nm->move(public_path() . '/storage/keuangan', $namaFile);
            } else {
                $request->file->move(public_path() . '/storage/keuangan', $fileLama);
            }
        }
        $keuangan_edit->users_id = $request->user;
        $keuangan_edit->save();

        return redirect()->route('keuangan')->with('status', 'Laporan Keuangan usaha successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $keuangan_hapus = Keuangan::findOrFail($id);
        $image_path = "storage/keuangan/" . $keuangan_hapus->file;

        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $keuangan_hapus->delete();
        return redirect()->route('keuangan')->with('status', 'Mentoring successfully deleted');
    }
}
