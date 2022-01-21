<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beasiswa;
use App\Models\Semester;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;


class BeasiswaController extends Controller
{
    public $new_beasiswa;
    public function __construct()
    {
        $this->new_beasiswa = new Beasiswa();
    }
    public function index()
    {
        return view('beasiswa.index');
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
        return view('beasiswa.create', [
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
            'agenda' => "required",
            'no_sertifikat' => "required",
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

        $this->new_beasiswa->nama = $request->nama;
        $this->new_beasiswa->no_sertifikat = $request->no_sertifikat;
        $this->new_beasiswa->agenda = $request->agenda;
        $this->new_beasiswa->semester_id = $request->semester_id;
        $this->new_beasiswa->users_id = $request->user;
        $ext = File::extension($namaFile);
        if ($ext == 'pdf') {
            $this->new_beasiswa->foto = $namaFile2;
            $nm->move(public_path() . '/storage/beasiswa', $namaFile2);
        } else {
            $this->new_beasiswa->foto = $namaFile;
            $nm->move(public_path() . '/storage/beasiswa', $namaFile);
        }
        $this->new_beasiswa->save();
        return redirect()->route('beasiswa')->with('status', 'Beasiswa successfully created');
    }

    public function store1(Request $request)
    {
        $rules = [
            'foto' => "required|mimes:png,jpg,jpeg,pdf|",
            'user' => "required",
            'semester_id' => "required",
            'nama' => "required",
            'penyelenggara' => "required"
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

        $this->new_beasiswa->nama = $request->nama;
        $this->new_beasiswa->penyelenggara = $request->penyelenggara;
        $this->new_beasiswa->semester_id = $request->semester_id;
        $this->new_beasiswa->users_id = $request->user;
        $ext = File::extension($namaFile);
        if ($ext == 'pdf') {
            $this->new_beasiswa->foto = $namaFile2;
            $nm->move(public_path() . '/storage/beasiswa', $namaFile2);
        } else {
            $this->new_beasiswa->foto = $namaFile;
            $nm->move(public_path() . '/storage/beasiswa', $namaFile);
        }
        $this->new_beasiswa->save();
        return redirect()->route('beasiswa')->with('status', 'Beasiswa successfully created');
    }
    public function store2(Request $request)
    {
        $rules = [
            'foto' => "required|mimes:png,jpg,jpeg,pdf|",
            'user' => "required",
            'semester_id' => "required",
            'nama' => "required",
            'deskripsi' => "required"
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

        $this->new_beasiswa->nama = $request->nama;
        $this->new_beasiswa->deskripsi = $request->deskripsi;
        $this->new_beasiswa->semester_id = $request->semester_id;
        $this->new_beasiswa->users_id = $request->user;
        $ext = File::extension($namaFile);
        if ($ext == 'pdf') {
            $this->new_beasiswa->foto = $namaFile2;
            $nm->move(public_path() . '/storage/beasiswa', $namaFile2);
        } else {
            $this->new_beasiswa->foto = $namaFile;
            $nm->move(public_path() . '/storage/beasiswa', $namaFile);
        }
        $this->new_beasiswa->save();
        return redirect()->route('beasiswa')->with('status', 'Beasiswa successfully created');
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

        $beasiswa_edit = Beasiswa::find($id);

        $data2 = DB::select("SELECT * FROM users WHERE role ='mahasiswa' ORDER BY name ");
        return view('beasiswa.edit', [
            'semester' => $data, 'user' => $data2, 'beasiswa' => $beasiswa_edit
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
        $beasiswa_edit = Beasiswa::find($id);
        $beasiswa_edit->nama = $request->nama;
        $beasiswa_edit->no_sertifikat = $request->no_sertifikat;
        $beasiswa_edit->agenda = $request->agenda;
        $beasiswa_edit->deskripsi = $request->deskripsi;
        $beasiswa_edit->penyelenggara = $request->penyelenggara;
        $beasiswa_edit->semester_id = $request->semester_id;
        $beasiswa_edit->users_id = $request->user;

        $gambarLama = $beasiswa_edit->foto;

        if (!$request->foto) {
            $beasiswa_edit->foto = $gambarLama;
        } else {

            if ($request->foto != $gambarLama) {
                $nm = $request->foto;
                $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();
                $namaFile2 = $nm->getClientOriginalName();

                $ext = File::extension($namaFile);
                if ($ext == 'pdf') {
                    $beasiswa_edit->foto = $namaFile2;
                    $nm->move(public_path() . '/storage/beasiswa', $namaFile2);
                } else {
                    $beasiswa_edit->foto = $namaFile;
                    $nm->move(public_path() . '/storage/beasiswa', $namaFile);
                }
            } else {
                $request->foto->move(public_path() . '/storage/beasiswa', $gambarLama);
            }
        }

        $beasiswa_edit->save();
        return redirect()->route('beasiswa')->with('status', 'Beasiswa successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $beasiswa_hapus = Beasiswa::findOrFail($id);
        $image_path = "storage/beasiswa/" . $beasiswa_hapus->foto;

        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $beasiswa_hapus->delete();
        return redirect()->route('beasiswa')->with('status', 'Beasiswa successfully deleted');
    }
}
