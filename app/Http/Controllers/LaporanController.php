<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\Semester;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class LaporanController extends Controller
{
    public $new_laporan;
    public function __construct()
    {
        $this->new_laporan = new Laporan();
    }
    public function index()
    {
        return view('laporan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Semester::all();
        // $data2 = User::all();
        $data2 = DB::select("SELECT * FROM users WHERE role ='mahasiswa' ORDER BY name");
        return view('laporan.create', [
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
            'laporan' => "required|mimes:pptx,docx|",
            'user' => "required",
            'semester_id' => "required"
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong",
            'min' => ":attribute karakter terlalu pendek",
            'max' => ":attribute karakter terlalu panjang / ukuran terlalu besar",
            'mimes' => ":attribute Ektensi error, gunakan .pptx atau .docx"
        ];

        $this->validate($request, $rules, $messages);
        $nm = $request->laporan;

        $namaFile = $nm->getClientOriginalName();

        $this->new_laporan->laporan = $namaFile;
        $this->new_laporan->semester_id = $request->semester_id;
        $this->new_laporan->users_id = $request->user;


        $nm->move(public_path() . '/storage/laporan', $namaFile);
        $this->new_laporan->save();

        return redirect()->route('laporan')->with('status', 'Laporan successfully created');
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
        // dapatkan data berdasarkan id kategori
        $laporan_edit = Laporan::find($id);

        $data2 = DB::select("SELECT * FROM users WHERE role ='mahasiswa' ORDER BY name");
        return view('laporan.edit', [
            'semester' => $data, 'user' => $data2, 'laporan' => $laporan_edit
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
            'laporan' => "required|max:800|mimes:pptx,docx|",
            'user' => "required",
            'semester_id' => "required"
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong",
            'min' => ":attribute karakter terlalu pendek",
            'max' => ":attribute karakter terlalu panjang / ukuran terlalu besar",
            'mimes' => ":attribute Ektensi error, gunakan .pptx atau .docx"
        ];


        $laporan_edit = Laporan::find($id);
        $fileLama = $laporan_edit->laporan;

        if (!$request->laporan) {
            $laporan_edit->laporan = $fileLama;
        } else {

            if ($request->laporan != $fileLama) {
                $nm = $request->laporan;

                $namaFile = $nm->getClientOriginalName();
                $laporan_edit->laporan = $namaFile;

                $nm->move(public_path() . '/storage/laporan', $namaFile);
            } else {
                $request->laporan->move(public_path() . '/storage/laporan', $fileLama);
            }
        }
        $laporan_edit->semester_id = $request->semester_id;
        $laporan_edit->users_id = $request->user;

        $laporan_edit->save();

        return redirect()->route('laporan')->with('status', 'Laporan successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $laporan_hapus = Laporan::findOrFail($id);
        $lpran = "storage/" . $laporan_hapus->laporan;

        if (File::exists($lpran)) {
            File::delete($lpran);
        }


        $laporan_hapus->delete();
        return redirect()->route('laporan')->with('status', 'Laporan Berhasi Di Hapus');
    }
}
