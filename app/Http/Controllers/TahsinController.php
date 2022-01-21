<?php

namespace App\Http\Controllers;

use App\Models\Tahsin;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Laravel\Ui\Presets\Preset;

class TahsinController extends Controller
{
    public $new_tahsin;
    public function __construct()
    {
        $this->new_tahsin = new Tahsin();
    }
    public function index()
    {
        return view('tahsin.index');
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
        return view('tahsin.create', [
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
            'foto' => "required|mimes:png,jpg,jpeg,pdf|",
            'user' => "required",
            'semester_id' => "required",
            'no_sk' => "required",
            'nilai' => "required",
            'level' => "required"
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong",
            'min' => ":attribute karakter terlalu pendek",
            'max' => ":attribute karakter terlalu panjang / ukuran terlalu besar",
            'mimes' => ":attribute Ektensi error, gunakan .png , .jpg dan .pdf"
        ];

        $this->validate($request, $rules, $messages);

        $nm = $request->foto;

        $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();
        $namaFile2 = $nm->getClientOriginalName();

        $this->new_tahsin->level = $request->level;
        $this->new_tahsin->no_sk = $request->no_sk;
        $this->new_tahsin->nilai = $request->nilai;
        $this->new_tahsin->semester_id = $request->semester_id;
        $this->new_tahsin->users_id = $request->user;
        $ext = File::extension($namaFile);
        if ($ext == 'pdf') {
            $this->new_tahsin->foto = $namaFile2;
            $nm->move(public_path() . '/storage/tahfiz', $namaFile2);
        } else {
            $this->new_tahsin->foto = $namaFile;
            $nm->move(public_path() . '/storage/tahfiz', $namaFile);
        }
        $this->new_tahsin->save();
        return redirect()->route('tahsin')->with('status', 'Tahasin successfully created');
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

        $tahsin_edit = Tahsin::find($id);

        $data2 = DB::select("SELECT * FROM users WHERE role ='mahasiswa' ORDER BY name ");
        return view('tahsin.edit', [
            'semester' => $data, 'user' => $data2, 'tahsin' => $tahsin_edit
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
        $tahsin_edit = Tahsin::find($id);
        $tahsin_edit->level = $request->level;
        $tahsin_edit->no_sk = $request->no_sk;
        $tahsin_edit->nilai = $request->nilai;
        $tahsin_edit->semester_id = $request->semester_id;
        $tahsin_edit->users_id = $request->user;

        $gambarLama = $tahsin_edit->foto;

        if (!$request->foto) {
            $tahsin_edit->foto = $gambarLama;
        } else {

            if ($request->foto != $gambarLama) {
                $nm = $request->foto;
                $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();
                $namaFile2 = $nm->getClientOriginalName();

                $ext = File::extension($namaFile);
                if ($ext == 'pdf') {
                    $tahsin_edit->foto = $namaFile2;
                    $nm->move(public_path() . '/storage/tahfiz', $namaFile2);
                } else {
                    $tahsin_edit->foto = $namaFile;
                    $nm->move(public_path() . '/storage/tahfiz', $namaFile);
                }
            } else {
                $request->foto->move(public_path() . '/storage/tahfiz', $gambarLama);
            }
        }

        $tahsin_edit->save();
        return redirect()->route('tahsin')->with('status', 'Tahsin successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tahsin_hapus = Tahsin::findOrFail($id);
        $image_path = "storage/tahfiz/" . $tahsin_hapus->foto;

        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $tahsin_hapus->delete();
        return redirect()->route('tahsin')->with('status', 'Tahsin successfully deleted');
    }
}
