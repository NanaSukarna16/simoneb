<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Laravel\Ui\Presets\Preset;

class PrestasiController extends Controller
{
    public $new_prestasi;
    public function __construct()
    {
        $this->new_prestasi = new Prestasi();
    }
    public function index()
    {
        return view('prestasi.index');
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
        return view('prestasi.create', [
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
            'nama' => "required",
            'peringkat' => "required",
            'level' => "required",
            'penyelenggara_prestasi' => "required"
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

        $this->new_prestasi->nama = $request->nama;
        $this->new_prestasi->peringkat = $request->peringkat;
        $this->new_prestasi->level = $request->level;
        $this->new_prestasi->penyelenggara_prestasi = $request->penyelenggara_prestasi;
        $this->new_prestasi->semester_id = $request->semester_id;
        $this->new_prestasi->users_id = $request->user;
        // $this->new_prestasi->foto = $namaFile;
        $ext = File::extension($namaFile);
        if ($ext == 'pdf') {
            $this->new_prestasi->foto = $namaFile2;
            $nm->move(public_path() . '/storage/prestasi', $namaFile2);
        } else {
            $this->new_prestasi->foto = $namaFile;
            $nm->move(public_path() . '/storage/prestasi', $namaFile);
        }

        $this->new_prestasi->save();
        return redirect()->route('prestasi')->with('status', 'Prestasi successfully created');
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

        $prestasi_edit = Prestasi::find($id);

        $data2 = DB::select("SELECT * FROM users WHERE role ='mahasiswa' ORDER BY name ");
        return view('prestasi.edit', [
            'semester' => $data, 'user' => $data2, 'prestasi' => $prestasi_edit
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
        $prestasi_edit = Prestasi::find($id);
        $prestasi_edit->nama = $request->nama;
        $prestasi_edit->peringkat = $request->peringkat;
        $prestasi_edit->level = $request->level;
        $prestasi_edit->penyelenggara_prestasi = $request->penyelenggara_prestasi;
        $prestasi_edit->semester_id = $request->semester_id;
        $prestasi_edit->users_id = $request->user;

        $gambarLama = $prestasi_edit->foto;

        if (!$request->foto) {
            $prestasi_edit->foto = $gambarLama;
        } else {

            if ($request->foto != $gambarLama) {
                $nm = $request->foto;
                $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();
                $namaFile2 = $nm->getClientOriginalName();

                $ext = File::extension($namaFile);
                if ($ext == 'pdf') {
                    $prestasi_edit->foto = $namaFile2;
                    $nm->move(public_path() . '/storage/prestasi', $namaFile2);
                } else {
                    $prestasi_edit->foto = $namaFile;
                    $nm->move(public_path() . '/storage/prestasi', $namaFile);
                }
            } else {
                $request->foto->move(public_path() . '/storage/prestasi', $gambarLama);
            }
        }

        $prestasi_edit->save();
        return redirect()->route('prestasi')->with('status', 'Prestasi successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prestasi_hapus = Prestasi::findOrFail($id);
        $image_path = "storage/prestasi/" . $prestasi_hapus->foto;

        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $prestasi_hapus->delete();
        return redirect()->route('prestasi')->with('status', 'Prestasi successfully deleted');
    }
}
