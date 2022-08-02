<?php

namespace App\Http\Controllers;

use App\Models\Angkatan;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
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
use Illuminate\Support\Facades\Hash;


class DaftarMahasiswa extends Controller
{
    public $new_user;
    public function __construct()
    {
        $this->new_mahasiswa = new User();
    }

    public function index()
    {

        $angkatan = request()->angkatan;
        if ($angkatan == null) {
            $data = DB::table('users')
                ->join('angkatan', 'users.angkatan_id', '=', 'angkatan.id')
                ->select('users.*', 'angkatan.nama')
                ->where('role', 'mahasiswa')
                ->get();
        } else {
            $data =  DB::table('users')
                ->join('angkatan', 'users.angkatan_id', '=', 'angkatan.id')
                ->select('users.*', 'angkatan.nama')
                ->where([
                    ['angkatan_id', '=', $angkatan],
                    ['role', '=', 'mahasiswa']
                ])
                ->get();
        }

        $data1 = Angkatan::select('*')
            ->orderBy('nama', 'ASC')
            ->get();
        return view('mahasiswa.index', [
            'mahasiswa' => $data, 'angkat' => $data1
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
        //
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
        // dapatkan data berdasarkan id kategori
        $id_user = User::find($id);

        $data = DB::select("SELECT * FROM messages WHERE users_id = $id");
        $data2 = DB::select("SELECT * FROM beasiswa WHERE users_id = $id ");
        $data3 = DB::select("SELECT * FROM forum WHERE users_id = $id ");
        $data4 = DB::select("SELECT * FROM karya WHERE users_id = $id ");
        $data5 = DB::select("SELECT * FROM mentoring WHERE users_id = $id ");
        $data6 = DB::select("SELECT * FROM org_mhs WHERE users_id = $id ");
        $data7 = DB::select("SELECT * FROM prestasi WHERE users_id = $id ");
        $data8 = DB::select("SELECT * FROM sosial WHERE users_id = $id ");
        $data9 = DB::select("SELECT * FROM tahsin WHERE users_id = $id ");
        $data10 = DB::select("SELECT * FROM laporan WHERE users_id = $id ");
        $data11 = DB::select("SELECT * FROM nilai WHERE users_id = $id ");
        $data12 = DB::select("SELECT * FROM profil_usaha WHERE users_id = $id ");
        $data13 = DB::select("SELECT * FROM ppt WHERE users_id = $id ");
        $data14 = DB::select("SELECT * FROM sku WHERE users_id = $id ");
        $data15 = DB::select("SELECT * FROM keuangan_usaha WHERE users_id = $id ");

        return view('mahasiswa.edit', [
            'mahasiswa' => $id_user, 'message' => $data, 'beasiswa' => $data2, 'forum' => $data3, 'karya' => $data4,
            'mentoring' => $data5, 'org_mhs' => $data6, 'prestasi' => $data7, 'sosial' => $data8, 'tahsin' => $data9,
            'laporan' => $data10,  'nilai' => $data11, 'usaha' => $data12, 'ppt' => $data13, 'sku' => $data14, 
            'keuangan' => $data15
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

        $user_edit = User::find($id);
        $user_edit->donatur = $request->donatur;
        $user_edit->keterangan = $request->keterangan;
        $user_edit->status = $request->status;
        $user_edit->password = Hash::make($request->password);



        $user_edit->save();
        return redirect()->route('mahasiswa')->with('status', 'Donatur, Keterangan, Status & Password successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_hapus = User::findOrFail($id);
        $image_path = "img/" . $user_hapus->profile_photo_path;

        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $user_hapus->delete();
        return redirect()->route('mahasiswa')->with('status', 'Mahasiswa Berhasi Di Hapus');
    }
}
