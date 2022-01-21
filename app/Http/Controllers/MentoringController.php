<?php

namespace App\Http\Controllers;

use App\Models\Mentoring;
use App\Models\Semester;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;


class MentoringController extends Controller
{
    public $new_mentoring;
    public function __construct()
    {
        $this->new_mentoring = new Mentoring();
    }
    public function index()
    {

        return view('mentoring.index');
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
        return view('mentoring.create', [
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
            'jml_pertemuan' => "required",
            'jml_kehadiran' => "required",
            'persen' => "required"
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong",
            'min' => ":attribute karakter terlalu pendek",
            'max' => ":attribute karakter terlalu panjang / ukuran terlalu besar",
            'mimes' => ":attribute Ektensi error, gunakan .png , .jpg, .jpeg dan .pdf"
        ];

        $this->validate($request, $rules, $messages);

        $nm = $request->foto;

        $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();
        $namaFile2 = $nm->getClientOriginalName();

        $this->new_mentoring->nama = $request->nama;
        $this->new_mentoring->jml_pertemuan = $request->jml_pertemuan;
        $this->new_mentoring->jml_kehadiran = $request->jml_kehadiran;
        $this->new_mentoring->persen = $request->persen;
        $this->new_mentoring->semester_id = $request->semester_id;
        $this->new_mentoring->users_id = $request->user;
        $ext = File::extension($namaFile);
        if ($ext == 'pdf') {
            $this->new_mentoring->foto = $namaFile2;
            $nm->move(public_path() . '/storage/mentoring', $namaFile2);
        } else {
            $this->new_mentoring->foto = $namaFile;
            $nm->move(public_path() . '/storage/mentoring', $namaFile);
        }

        $this->new_mentoring->save();
        return redirect()->route('mentoring')->with('status', 'Mentoring successfully created');
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

        $mentoring_edit = Mentoring::find($id);

        $data2 = DB::select("SELECT * FROM users WHERE role ='mahasiswa' ORDER BY name ");
        return view('mentoring.edit', [
            'semester' => $data, 'user' => $data2, 'mentoring' => $mentoring_edit
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
        $mentoring_edit = Mentoring::find($id);
        $mentoring_edit->nama = $request->nama;
        $mentoring_edit->jml_pertemuan = $request->jml_pertemuan;
        $mentoring_edit->jml_kehadiran = $request->jml_kehadiran;
        $mentoring_edit->persen = $request->persen;
        $mentoring_edit->semester_id = $request->semester_id;
        $mentoring_edit->users_id = $request->user;

        $gambarLama = $mentoring_edit->foto;

        if (!$request->foto) {
            $mentoring_edit->foto = $gambarLama;
        } else {

            if ($request->foto != $gambarLama) {
                $nm = $request->foto;
                $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();
                $namaFile2 = $nm->getClientOriginalName();

                $ext = File::extension($namaFile);
                if ($ext == 'pdf') {
                    $mentoring_edit->foto = $namaFile2;
                    $nm->move(public_path() . '/storage/mentoring', $namaFile2);
                } else {
                    $mentoring_edit->foto = $namaFile;
                    $nm->move(public_path() . '/storage/mentoring', $namaFile);
                }
            } else {
                $request->foto->move(public_path() . '/storage/mentoring', $gambarLama);
            }
        }
        $mentoring_edit->save();
        return redirect()->route('mentoring')->with('status', 'Mentoring successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mentoring_hapus = Mentoring::findOrFail($id);
        $image_path = "storage/mentoring/" . $mentoring_hapus->foto;

        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $mentoring_hapus->delete();
        return redirect()->route('mentoring')->with('status', 'Mentoring successfully deleted');
    }
}
