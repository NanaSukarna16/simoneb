<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Semester;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PesanController extends Controller
{
    public $new_pesan;
    public function __construct()
    {
        $this->new_pesan = new Message();

        // gunakan middleware untuk cek Gate Authorize Usernya

        // $this->middleware(function($request, $next){

        //     if (Gate::allows('manage-categories')) return $next ($request);
        //     abort(403, 'Anda tidak memiliki cukup hak akses');

        // });
    }
    public function index()
    {
        //
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
        return view('pesan.create', [
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
            'messages' => "required|min:10|max:300",
            'user' => "required",
            'semester_id' => "required"
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong",
            'min' => ":attribute karakter terlalu pendek",
            'max' => ":attribute karakter terlalu panjang / ukuran terlalu besar"
        ];

        $this->validate($request, $rules, $messages);

        DB::table('messages')->insert([
            'messages' => $request->messages,
            'semester_id' => $request->semester_id,
            'users_id' => $request->user
        ]);



        return redirect()->route('mahasiswa')->with('status', 'Category successfully created');
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
        $pesan_edit = Message::find($id);

        // debugging 
        // var_dump($category_edit);


        //passing data ke view
        // return view('buku.edit', [
        //     'buku' => $buku_edit
        // ]);
        // $data2 = User::all();
        $data2 = DB::select("SELECT * FROM users WHERE role ='mahasiswa' ORDER BY name");
        return view('pesan.edit', [
            'semester' => $data, 'user' => $data2, 'pesan' => $pesan_edit
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
            'messages' => "required|min:10|max:300",
            'user' => "required",
            'semester_id' => "required"
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong",
            'min' => ":attribute karakter terlalu pendek",
            'max' => ":attribute karakter terlalu panjang / ukuran terlalu besar"
        ];

        $this->validate($request, $rules, $messages);

        // DB::table('messages')->insert([
        //     'messages' => $request->messages,
        //     'semester_id' => $request->semester_id,
        //     'users_id' => $request->user
        // ]);
        $pesan_edit = Message::find($id);
        $pesan_edit->messages = $request->messages;
        $pesan_edit->semester_id = $request->semester_id;
        $pesan_edit->users_id = $request->user;

        $pesan_edit->save();

        return redirect()->route('mahasiswa')->with('status', 'Pesan successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pesan_hapus = Message::findOrFail($id);

        $id_user = User::find($id);

        $data = DB::select("SELECT * FROM messages WHERE users_id = $id ");
        // $id_user = User::find($id);

        // DB::delete("DELETE * FROM messages WHERE users_id = $id ");

        $pesan_hapus->delete();
        return redirect()->route('mahasiswa')->with('status', 'Pesan Berhasi Di Hapus');
    }
}
