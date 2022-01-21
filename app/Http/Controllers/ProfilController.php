<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Beasiswa;
use App\Models\Mentoring;
use App\Models\Forum;
use App\Models\Karya;
use App\Models\Org_mhs;
use App\Models\Prestasi;
use App\Models\Sosial;
use App\Models\Tahsin;
use App\Models\Nilai;
use App\Models\Laporan;
use App\Models\Message;
use Auth;
use Illuminate\Support\Facades\Hash;


class ProfilController extends Controller
{
    public $new_user;
    public function __construct()
    {
        $this->new_mahasiswa = new User();
    }
    public function index()
    {
        $data = DB::select("SELECT * FROM users WHERE role ='mahasiswa' ORDER BY name");
        $this->user = Auth::user();

        $beasiswa = Beasiswa::where('users_id', $this->user->id)->get()->count();
        $nilai = Nilai::where('users_id', $this->user->id)->get()->count();
        $karya = Karya::where('users_id', $this->user->id)->get()->count();
        $forum = Forum::where('users_id', $this->user->id)->get()->count();
        $prestasi = Prestasi::where('users_id', $this->user->id)->get()->count();
        $organisasi = Org_mhs::where('users_id', $this->user->id)->get()->count();
        $sosial = Sosial::where('users_id', $this->user->id)->get()->count();
        $mentoring = Mentoring::where('users_id', $this->user->id)->get()->count();
        $tahsin = Tahsin::where('users_id', $this->user->id)->get()->count();


        return view('profile.index', [
            'profil' => $data, 'beasiswa' => $beasiswa, 'nilai' => $nilai, 'karya' => $karya, 'forum' => $forum, 'prestasi' => $prestasi,
            'organisasi' => $organisasi, 'sosial' => $sosial, 'mentoring' => $mentoring, 'tahsin' => $tahsin
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
    public function edit(Request $request)
    {
        $data2 = DB::select("SELECT * FROM users WHERE role ='mahasiswa' ORDER BY name");
        return view('profile.edit', [
            'profil' => $data2, 'user' => $request->user()
        ]);
    }
    public function edit2(Request $request)
    {
        return view('profile.password');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $gambarLama = $request->user()->foto;

        if (!$request->foto) {
            $request->user()->foto = $gambarLama;
        } else {

            if ($request->foto != $gambarLama) {
                $nm = $request->foto;

                $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();

                $request->user()->foto = $namaFile;
                $nm->move(public_path() . '/img', $namaFile);
            } else {
                $request->foto->move(public_path() . '/img', $gambarLama);
            }
        }

        $request->user()->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'nim' => $request['nim'],
            'angkatan_id' => $request['angkatan_id'],
            'prodi' => $request['prodi'],
            'alamat' => $request['alamat'],
            'provinsi' => $request['provinsi'],
            'hp' => $request['hp'],
            'beasiswa' => $request['beasiswa'],
        ]);

        return redirect()->route('profil');
    }

    public function update2(Request $request)
    {
        $request->user()->update([
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->route('profil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
