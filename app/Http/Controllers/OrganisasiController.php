<?php

namespace App\Http\Controllers;

use App\Models\Org_mhs;
use App\Models\Semester;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class OrganisasiController extends Controller
{
    public $new_organisasi;
    public function __construct()
    {
        $this->new_organisasi = new Org_mhs();
    }
    public function index()
    {
        return view('organisasi.index');
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
        return view('organisasi.create', [
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
            'jabatan' => "required",
            'masa_jabatan' => "required",
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

        $this->new_organisasi->nama = $request->nama;
        $this->new_organisasi->jabatan = $request->jabatan;
        $this->new_organisasi->masa_jabatan = $request->masa_jabatan;
        $this->new_organisasi->semester_id = $request->semester_id;
        $this->new_organisasi->users_id = $request->user;
        $ext = File::extension($namaFile);
        if ($ext == 'pdf') {
            $this->new_organisasi->foto = $namaFile2;
            $nm->move(public_path() . '/storage/organisasi', $namaFile2);
        } else {
            $this->new_organisasi->foto = $namaFile;
            $nm->move(public_path() . '/storage/organisasi', $namaFile);
        }
        $this->new_organisasi->save();
        return redirect()->route('organisasi')->with('status', 'Organisasi successfully created');
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

        $organisasi_edit = Org_mhs::find($id);

        $data2 = DB::select("SELECT * FROM users WHERE role ='mahasiswa' ORDER BY name ");
        return view('organisasi.edit', [
            'semester' => $data, 'user' => $data2, 'organisasi' => $organisasi_edit
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
        $organisasi_edit = Org_mhs::find($id);
        $organisasi_edit->nama = $request->nama;
        $organisasi_edit->jabatan = $request->jabatan;
        $organisasi_edit->masa_jabatan = $request->masa_jabatan;
        $organisasi_edit->semester_id = $request->semester_id;
        $organisasi_edit->users_id = $request->user;

        $gambarLama = $organisasi_edit->foto;

        if (!$request->foto) {
            $organisasi_edit->foto = $gambarLama;
        } else {

            if ($request->foto != $gambarLama) {
                $nm = $request->foto;
                $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();
                $namaFile2 = $nm->getClientOriginalName();

                $ext = File::extension($namaFile);
                if ($ext == 'pdf') {
                    $organisasi_edit->foto = $namaFile2;
                    $nm->move(public_path() . '/storage/organisasi', $namaFile2);
                } else {
                    $organisasi_edit->foto = $namaFile;
                    $nm->move(public_path() . '/storage/organisasi', $namaFile);
                }
            } else {
                $request->foto->move(public_path() . '/storage/organisasi', $gambarLama);
            }
        }
        $organisasi_edit->save();
        return redirect()->route('organisasi')->with('status', 'Organisasi successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $organisasi_hapus = Org_mhs::findOrFail($id);
        $image_path = "storage/organisasi/" . $organisasi_hapus->foto;

        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $organisasi_hapus->delete();
        return redirect()->route('organisasi')->with('status', 'Organisasi successfully deleted');
    }
}
