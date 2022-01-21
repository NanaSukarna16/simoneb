<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Semester;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class ForumController extends Controller
{
    public $new_forum;
    public function __construct()
    {
        $this->new_forum = new Forum();
    }
    public function index()
    {
        return view('forum.index');
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
        return view('forum.create', [
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
            'penyelenggara' => "required",
            'tanggal' => "required"
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

        $this->new_forum->nama = $request->nama;
        $this->new_forum->penyelenggara = $request->penyelenggara;
        $this->new_forum->tgl = $request->tanggal;
        $this->new_forum->semester_id = $request->semester_id;
        $this->new_forum->users_id = $request->user;
        $ext = File::extension($namaFile);
        if ($ext == 'pdf') {
            $this->new_forum->foto = $namaFile2;
            $nm->move(public_path() . '/storage/forum', $namaFile2);
        } else {
            $this->new_forum->foto = $namaFile;
            $nm->move(public_path() . '/storage/forum', $namaFile);
        }
        $this->new_forum->save();
        return redirect()->route('forum')->with('status', 'Forum successfully created');
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
        $forum_edit = Forum::find($id);

        $data2 = DB::select("SELECT * FROM users WHERE role ='mahasiswa' ORDER BY name ");
        return view('forum.edit', [
            'semester' => $data, 'user' => $data2, 'forum' => $forum_edit
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

        $forum_edit = Forum::find($id);
        $forum_edit->nama = $request->nama;
        $forum_edit->tgl = $request->tanggal;
        $forum_edit->penyelenggara = $request->penyelenggara;
        $forum_edit->semester_id = $request->semester_id;
        $forum_edit->users_id = $request->user;

        $gambarLama = $forum_edit->foto;

        if (!$request->foto) {
            $forum_edit->foto = $gambarLama;
        } else {

            if ($request->foto != $gambarLama) {
                $nm = $request->foto;
                $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();
                $namaFile2 = $nm->getClientOriginalName();

                $ext = File::extension($namaFile);
                if ($ext == 'pdf') {
                    $forum_edit->foto = $namaFile2;
                    $nm->move(public_path() . '/storage/forum', $namaFile2);
                } else {
                    $forum_edit->foto = $namaFile;
                    $nm->move(public_path() . '/storage/forum', $namaFile);
                }
            } else {
                $request->foto->move(public_path() . '/storage/forum', $gambarLama);
            }
        }
        $forum_edit->save();
        return redirect()->route('forum')->with('status', 'Forum successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $forum_hapus = Forum::findOrFail($id);
        $image_path = "storage/forum/" . $forum_hapus->foto;

        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $forum_hapus->delete();
        return redirect()->route('forum')->with('status', 'Forum successfully deleted');
    }
}
