<?php

namespace App\Http\Controllers;

use App\Models\Sosial;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Laravel\Ui\Presets\Preset;

class SosialController extends Controller
{

    public $new_sosial;
    public function __construct()
    {
        $this->new_sosial = new Sosial();
    }
    public function index()
    {
        return view('sosial.index');
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
        return view('sosial.create', [
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
            'tanggal' => "required",
            'penyelenggara_sosial' => "required"
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

        $this->new_sosial->nama = $request->nama;
        $this->new_sosial->tgl = $request->tanggal;
        $this->new_sosial->penyelenggara_sosial = $request->penyelenggara_sosial;
        $this->new_sosial->semester_id = $request->semester_id;
        $this->new_sosial->users_id = $request->user;
        $ext = File::extension($namaFile);
        if ($ext == 'pdf') {
            $this->new_sosial->foto = $namaFile2;
            $nm->move(public_path() . '/storage/sosial', $namaFile2);
        } else {
            $this->new_sosial->foto = $namaFile;
            $nm->move(public_path() . '/storage/sosial', $namaFile);
        }
        $this->new_sosial->save();
        return redirect()->route('sosial')->with('status', 'Sosial successfully created');
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

        $sosial_edit = Sosial::find($id);

        $data2 = DB::select("SELECT * FROM users WHERE role ='mahasiswa' ORDER BY name ");
        return view('sosial.edit', [
            'semester' => $data, 'user' => $data2, 'sosial' => $sosial_edit
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

        $sosial_edit = Sosial::find($id);
        $sosial_edit->nama = $request->nama;
        $sosial_edit->tgl = $request->tanggal;
        $sosial_edit->penyelenggara_sosial = $request->penyelenggara_sosial;
        $sosial_edit->semester_id = $request->semester_id;
        $sosial_edit->users_id = $request->user;

        $gambarLama = $sosial_edit->foto;

        if (!$request->foto) {
            $sosial_edit->foto = $gambarLama;
        } else {
            if ($request->foto != $gambarLama) {
                $nm = $request->foto;
                $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();
                $namaFile2 = $nm->getClientOriginalName();

                $ext = File::extension($namaFile);
                if ($ext == 'pdf') {
                    $sosial_edit->foto = $namaFile2;
                    $nm->move(public_path() . '/storage/sosial', $namaFile2);
                } else {
                    $sosial_edit->foto = $namaFile;
                    $nm->move(public_path() . '/storage/sosial', $namaFile);
                }
            } else {
                $request->foto->move(public_path() . '/storage/sosial', $gambarLama);
            }
        }
        $sosial_edit->save();
        return redirect()->route('sosial')->with('status', 'Sosial successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sosial_hapus = Sosial::findOrFail($id);
        $image_path = "storage/sosial/" . $sosial_hapus->foto;

        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $sosial_hapus->delete();
        return redirect()->route('sosial')->with('status', 'Sosial successfully deleted');
    }
}
