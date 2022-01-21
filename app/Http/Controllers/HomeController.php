<?php

namespace App\Http\Controllers;

use App\Models\Angkatan;
use Illuminate\Http\Request;
use App\Models\Beasiswa;
use App\Models\Mentoring;
use App\Models\Forum;
use App\Models\Karya;
use App\Models\Org_mhs;
use App\Models\Prestasi;
use App\Models\Sosial;
use App\Models\Tahsin;
use App\Models\Nilai;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public $beasiswas, $nama, $deskripsi, $foto, $semester, $users_id, $beasiswa_id, $user;
    public $isModal = 0;

    protected $rules = [
        'nama' => 'required|string',
        'deskripsi' => 'required|string',
        'foto' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf,docx|max:10048',
        'semester' => 'required'
    ];

    public $new_angkatan;
    public function __construct()
    {
        $this->middleware('auth');
        $this->new_angkatan = new Angkatan();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $jumlah = Beasiswa::count();
        $jumlah2 = Forum::count();
        $jumlah3 = Karya::count();
        $jumlah4 = Mentoring::count();
        $jumlah5 = Org_mhs::count();
        $jumlah6 = Prestasi::count();
        $jumlah7 = Sosial::count();
        $jumlah8 = Tahsin::count();
        $jumlah9 = Nilai::count();

        $jumlah_mhs =  DB::table('users')->where('role', 'mahasiswa')->count();
        $jumlah_porto = $jumlah + $jumlah2 + $jumlah3 + $jumlah4 + $jumlah5 + $jumlah6 + $jumlah7 + $jumlah8 + $jumlah9;

        return view('home', [
            'jumlah_mhs' => $jumlah_mhs,
            'jumlah_porto' => $jumlah_porto,
        ]);
    }
    public function store(Request $request)
    {
        $rules = [
            'nama' => "required"
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong",
            'min' => ":attribute karakter terlalu pendek",
            'max' => ":attribute karakter terlalu panjang / ukuran terlalu besar",
            'mimes' => ":attribute Ektensi error, gunakan .png , .jpg dan .docx"
        ];

        $this->validate($request, $rules, $messages);


        $this->new_angkatan->nama = $request->nama;

        $this->new_angkatan->save();
        return redirect()->route('home')->with('status', 'Angkatan successfully created');
    }
    public function destroy($id)
    {
        DB::delete("DELETE a.*, b.* FROM angkatan a JOIN users b ON a.id = b.angkatan_id WHERE a.id = $id");

        return redirect()->route('home')->with('status', 'Angkatan successfully deleted');
    }
}
