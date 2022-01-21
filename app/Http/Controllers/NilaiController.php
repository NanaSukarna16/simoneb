<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Laravel\Ui\Presets\Preset;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    public $new_nilai;
    public function __construct()
    {
        $this->new_nilai = new Nilai();
    }
    public function index()
    {
        return view('nilai.index');
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
        return view('nilai.create', [
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
            'ipk' => "required",
            'ips' => "required",
            'tahun' => "required"
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong",
            'mimes' => ":attribute Ektensi error, gunakan .png , .jpg, .jpeg dan .pdf"
        ];

        $this->validate($request, $rules, $messages);

        $nm = $request->foto;

        $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();
        $namaFile2 = $nm->getClientOriginalName();

        $this->new_nilai->ipk = $request->ipk;
        $this->new_nilai->ips = $request->ips;
        $this->new_nilai->tahun = $request->tahun;
        $this->new_nilai->semester_id = $request->semester_id;
        $this->new_nilai->users_id =  Auth::user()->id;

        $ext = File::extension($namaFile);
        if ($ext == 'pdf') {
            $this->new_nilai->foto = $namaFile2;
            $nm->move(public_path() . '/storage/nilai', $namaFile2);
        } else {
            $this->new_nilai->foto = $namaFile;
            $nm->move(public_path() . '/storage/nilai', $namaFile);
        }

        $this->new_nilai->save();
        return redirect()->route('nilai')->with('status', 'Nilai successfully created');
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
        $nilai_edit = Nilai::find($id);

        $data2 = DB::select("SELECT * FROM users WHERE role ='mahasiswa' ORDER BY name ");
        return view('nilai.edit', [
            'semester' => $data, 'user' => $data2, 'nilai' => $nilai_edit
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
        $nilai_edit = Nilai::find($id);
        $nilai_edit->ipk = $request->ipk;
        $nilai_edit->ips = $request->ips;
        $nilai_edit->tahun = $request->tahun;
        $nilai_edit->semester_id = $request->semester_id;
        $nilai_edit->users_id = $request->user;
        $gambarLama = $nilai_edit->foto;

        if (!$request->foto) {
            $nilai_edit->foto = $gambarLama;
        } else {

            if ($request->foto != $gambarLama) {
                $nm = $request->foto;

                $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();
                $namaFile2 = $nm->getClientOriginalName();
                $ext = File::extension($namaFile);
                if ($ext == 'pdf') {
                    $nilai_edit->foto = $namaFile2;
                    $nm->move(public_path() . '/storage/nilai', $namaFile2);
                } else {
                    $nilai_edit->foto = $namaFile;
                    $nm->move(public_path() . '/storage/nilai', $namaFile);
                }
            } else {
                $request->foto->move(public_path() . '/storage/nilai', $gambarLama);
            }
        }

        $nilai_edit->save();
        return redirect()->route('nilai')->with('status', 'Nilai successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nilai_hapus = Nilai::findOrFail($id);
        $image_path = "storage/nilai/" . $nilai_hapus->foto;

        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $nilai_hapus->delete();
        return redirect()->route('nilai')->with('status', 'Nilai successfully deleted');
    }
}
