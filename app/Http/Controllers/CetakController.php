<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{Angkatan, Nilai, Karya, Sosial, Prestasi, Org_mhs as Org, Forum, Mentoring, Tahsin, Beasiswa};
use PhpOffice\PhpWord\TemplateProcessor;
use App\Models\Semester;
use Illuminate\Support\Facades\DB;

class CetakController extends Controller
{

    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data = Semester::all();
        // return view('template.app', [
        //     'semester' => $data
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Awal laporan beasiswa enterpreneur
        if (auth()->user()->beasiswa == 'enterpreneur') {
            $ui         = new TemplateProcessor('exam.docx');
            $siswa      = auth()->user();
            $siswa2      = Angkatan::where('id', auth()->user()->angkatan_id)->get();
            $semester    =  $request->semester_id;
            $forum       = [];
            $sosial        = [];
            $karya      = [];
            $org        = [];
            $prestasi    = [];
            $mentor        = [];
            $tahsin        = [];
            $beasiswa    = [];
            $nilai    = [];
            // $nilai        = Nilai::where('semester_id', $semester)->where('users_id', $siswa->id)->get();
            foreach (Beasiswa::where('semester_id', $semester)->where('users_id', $siswa->id)->get() as $inc => $row) {
                array_push($beasiswa, [
                    'beasiswa_no'     => ($inc + 1),
                    'beasiswa_nama' => $row->nama,
                    'beasiswa_ket'     => $row->deskripsi
                ]);
            }
            foreach (Mentoring::where('semester_id', $semester)->where('users_id', $siswa->id)->get() as $inc => $row) {
                array_push($mentor, [
                    'mentor_nama'         => $row->nama,
                    'mentor_pertemuan'     => $row->jml_pertemuan,
                    'mentor_kehadiran'     => $row->jml_kehadiran,
                    'mentor_percen'     => $row->persen
                ]);
            }
            foreach (Tahsin::where('semester_id', $semester)->where('users_id', $siswa->id)->get() as $inc => $row) {
                array_push($tahsin, [
                    'tahsin_level'     => $row->level,
                    'tahsin_sk'     => $row->no_sk,
                    'tahsin_nilai'     => $row->nilai
                ]);
            }

            foreach (Karya::where('semester_id', $semester)->where('users_id', $siswa->id)->get() as $inc => $row) {
                array_push($karya, [
                    'karya_no'         => ($inc + 1),
                    'karya_tgl'     => $row->tgl,
                    'karya_judul'     => $row->judul,
                    'karya_nama'     => $row->media,
                    'karya_link'     => $row->link,
                ]);
            }

            foreach (Prestasi::where('semester_id', $semester)->where('users_id', $siswa->id)->get() as $inc => $row) {
                array_push($prestasi, [
                    'prestasi_no'             => ($inc + 1),
                    'prestasi_peringkat'     => $row->peringkat,
                    'prestasi_nama'         => $row->nama,
                    'prestasi_level'         => $row->level,
                    'prestasi_penyelenggara' => $row->penyelenggara_prestasi
                ]);
            }

            foreach (Org::where('semester_id', $semester)->where('users_id', $siswa->id)->get() as $inc => $row) {
                array_push($org, [
                    'organisasi_no'         => ($inc + 1),
                    'organisasi_nama'         => $row->nama,
                    'organisasi_jabatan'     => $row->jabatan,
                    'organisasi_masa'         => $row->masa_jabatan,
                ]);
            }

            foreach (Sosial::where('semester_id', $semester)->where('users_id', $siswa->id)->get() as $inc => $row) {
                array_push($sosial, [
                    'sosial_no'             => ($inc + 1),
                    'sosial_tgl'             => $row->tgl,
                    'sosial_nama'             => $row->nama,
                    'sosial_penyelenggara'    => $row->penyelanggara_sosial,
                ]);
            }

            foreach (Forum::where('semester_id', $semester)->where('users_id', $siswa->id)->get() as $i => $row) {
                array_push($forum, [
                    'forum_no'         => ($i + 1),
                    'forum_tgl'     => $row->tgl,
                    'forum_nama'     => $row->nama
                ]);
            }

            foreach (Nilai::where('semester_id', $semester)->where('users_id', $siswa->id)->get() as $i => $row) {
                array_push($nilai, [
                    'ipk_siswa'     => $row->ipk,
                    'ips_siswa'     => $row->ips,
                ]);
            }

            // foreach (Angkatan::where('id', $siswa->angkatan_id)->get() as $i => $row) {
            //     array_push($siswa2, [
            //         'angkatan_siswa'     => $row->nama,
            //     ]);
            // }

            // foreach (DB::table('users')->join('angkatan', 'users.angkatan_id', '=', 'angkatan.id')->select('angkatan.nama')->get() as $i => $row) {
            //     array_push($siswa2, [
            //         'angkatan_siswa' => $row->nama
            //     ]);
            // }
            $ui->setImageValue('pasfoto_siswa', [
                'path' => auth()->user()->foto == NULL ? "https://discountdoorhardware.ca/wp-content/uploads/2018/06/profile-placeholder-3.jpg" : asset('img/') . '/' . auth()->user()->foto,
                'width' => 70,
                'height' => 60,
                'ratio' => false
            ]);

            $ui->setValues([
                'nama_siswa'     => $siswa->name,
                'nim_siswa'         => $siswa->nim,
                'email_siswa'    => $siswa->email,
                'alamat_siswa'  => $siswa->alamat,
                'telp_siswa'     => $siswa->hp,
                'angkatan_siswa' => $siswa->angkatan,
                'program_studi'     => $siswa->prodi,
                // 'ips_siswa'     => $nilai->ips,
                'semester'        => $semester,
                'thn_akademik'    => $siswa->angkatan
            ]);

            $ui->cloneRowAndSetValues('forum_no', $forum);
            $ui->cloneRowAndSetValues('ipk_siswa', $nilai);
            $ui->cloneRowAndSetValues('ips_siswa', $nilai);
            // $ui->cloneRowAndSetValues('angkatan_siswa', $siswa2);
            $ui->cloneRowAndSetValues('karya_no', $karya);
            $ui->cloneRowAndSetValues('sosial_no', $sosial);
            $ui->cloneRowAndSetValues('organisasi_no', $org);
            $ui->cloneRowAndSetValues('prestasi_no', $prestasi);
            $ui->cloneRowAndSetValues('mentor_nama', $mentor);
            $ui->cloneRowAndSetValues('tahsin_level', $tahsin);
            $ui->cloneRowAndSetValues('beasiswa_no', $beasiswa);


            header('Content-Disposition:attachment; filename=laporan.docx');
            $ui->saveAs('php://output');

            exit;
        }

        // Awal laporan beasiswa hafidz
        elseif (auth()->user()->beasiswa == 'hafidz') {
            $ui         = new TemplateProcessor('exam2.docx');
            $siswa      = auth()->user();
            $semester    =  $request->semester_id;
            $forum       = [];
            $sosial        = [];
            $karya      = [];
            $org        = [];
            $prestasi    = [];
            $mentor        = [];
            $tahsin        = [];
            $beasiswa    = [];
            $nilai    = [];
            // $nilai        = Nilai::where('semester_id', $semester)->where('users_id', $siswa->id)->get();
            foreach (Beasiswa::where('semester_id', $semester)->where('users_id', $siswa->id)->get() as $inc => $row) {
                array_push($beasiswa, [
                    'beasiswa_no'     => ($inc + 1),
                    'beasiswa_nama' => $row->nama,
                    'beasiswa_penyelenggara' => $row->penyelenggara,
                    'beasiswa_ket'     => $row->deskripsi
                ]);
            }

            foreach (Mentoring::where('semester_id', $semester)->where('users_id', $siswa->id)->get() as $inc => $row) {
                array_push($mentor, [
                    'mentor_nama'         => $row->nama,
                    'mentor_pertemuan'     => $row->jml_pertemuan,
                    'mentor_kehadiran'     => $row->jml_kehadiran,
                    'mentor_percen'     => $row->persen
                ]);
            }

            foreach (Tahsin::where('semester_id', $semester)->where('users_id', $siswa->id)->get() as $inc => $row) {
                array_push($tahsin, [
                    'tahsin_level'     => $row->level,
                    'tahsin_sk'     => $row->no_sk,
                    'tahsin_nilai'     => $row->nilai
                ]);
            }

            foreach (Karya::where('semester_id', $semester)->where('users_id', $siswa->id)->get() as $inc => $row) {
                array_push($karya, [
                    'karya_no'         => ($inc + 1),
                    'karya_tgl'     => $row->tgl,
                    'karya_judul'     => $row->judul,
                    'karya_nama'     => $row->media,
                    'karya_link'     => $row->link,
                ]);
            }

            foreach (Prestasi::where('semester_id', $semester)->where('users_id', $siswa->id)->get() as $inc => $row) {
                array_push($prestasi, [
                    'prestasi_no'             => ($inc + 1),
                    'prestasi_peringkat'     => $row->peringkat,
                    'prestasi_nama'         => $row->nama,
                    'prestasi_level'         => $row->level,
                    'prestasi_penyelenggara' => $row->penyelenggara_prestasi
                ]);
            }

            foreach (Org::where('semester_id', $semester)->where('users_id', $siswa->id)->get() as $inc => $row) {
                array_push($org, [
                    'organisasi_no'         => ($inc + 1),
                    'organisasi_nama'         => $row->nama,
                    'organisasi_jabatan'     => $row->jabatan,
                    'organisasi_masa'         => $row->masa_jabatan,
                ]);
            }

            foreach (Sosial::where('semester_id', $semester)->where('users_id', $siswa->id)->get() as $inc => $row) {
                array_push($sosial, [
                    'sosial_no'             => ($inc + 1),
                    'sosial_tgl'             => $row->tgl,
                    'sosial_nama'             => $row->nama,
                    'sosial_penyelenggara'    => $row->penyelanggara_sosial,
                ]);
            }

            foreach (Forum::where('semester_id', $semester)->where('users_id', $siswa->id)->get() as $i => $row) {
                array_push($forum, [
                    'forum_no'         => ($i + 1),
                    'forum_tgl'     => $row->tgl,
                    'forum_nama'     => $row->nama
                ]);
            }

            foreach (Nilai::where('semester_id', $semester)->where('users_id', $siswa->id)->get() as $i => $row) {
                array_push($nilai, [
                    'ipk_siswa'     => $row->ipk,
                    'ips_siswa'     => $row->ips,
                ]);
            }



            $ui->setImageValue('pasfoto_siswa', [
                'path' => auth()->user()->foto == NULL ? "https://discountdoorhardware.ca/wp-content/uploads/2018/06/profile-placeholder-3.jpg" : asset('img/') . '/' . auth()->user()->foto,
                'width' => 70,
                'height' => 60,
                'ratio' => false
            ]);

            $ui->setValues([
                'nama_siswa'     => $siswa->name,
                'nim_siswa'         => $siswa->nim,
                'email_siswa'    => $siswa->email,
                'alamat_siswa'  => $siswa->alamat,
                'telp_siswa'     => $siswa->hp,
                'angkatan_siswa' => $siswa->angkatan,
                'program_studi'     => $siswa->prodi,
                // 'ipk_siswa'     => $nilai->ipk,
                // 'ips_siswa'     => $nilai->ips,
                'semester'        => $semester,
                'thn_akademik'    => $siswa->angkatan
            ]);

            $ui->cloneRowAndSetValues('forum_no', $forum);
            $ui->cloneRowAndSetValues('ipk_siswa', $nilai);
            $ui->cloneRowAndSetValues('ips_siswa', $nilai);
            $ui->cloneRowAndSetValues('karya_no', $karya);
            $ui->cloneRowAndSetValues('sosial_no', $sosial);
            $ui->cloneRowAndSetValues('organisasi_no', $org);
            $ui->cloneRowAndSetValues('prestasi_no', $prestasi);
            $ui->cloneRowAndSetValues('mentor_nama', $mentor);
            $ui->cloneRowAndSetValues('tahsin_level', $tahsin);
            $ui->cloneRowAndSetValues('beasiswa_no', $beasiswa);


            header('Content-Disposition:attachment; filename=laporan.docx');
            $ui->saveAs('php://output');

            exit;
        }

        // Awal laporan beasiswa hes
        elseif (auth()->user()->beasiswa == 'hes') {
            $ui         = new TemplateProcessor('exam3.docx');
            $siswa      = auth()->user();
            $semester    =  $request->semester_id;
            $forum       = [];
            $sosial        = [];
            $karya      = [];
            $org        = [];
            $prestasi    = [];
            $mentor        = [];
            $tahsin        = [];
            $beasiswa    = [];
            $nilai    = [];
            foreach (Beasiswa::where('semester_id', $semester)->where('users_id', $siswa->id)->get() as $inc => $row) {
                array_push($beasiswa, [
                    'beasiswa_no'     => $row->no_sertifikat,
                    'beasiswa_nama' => $row->nama,
                    'beasiswa_penyelenggara' => $row->penyelenggara,
                    'beasiswa_ket'     => $row->deskripsi,
                    'beasiswa_agenda'     => $row->agenda
                ]);
            }

            foreach (Mentoring::where('semester_id', $semester)->where('users_id', $siswa->id)->get() as $inc => $row) {
                array_push($mentor, [
                    'mentor_nama'         => $row->nama,
                    'mentor_pertemuan'     => $row->jml_pertemuan,
                    'mentor_kehadiran'     => $row->jml_kehadiran,
                    'mentor_percen'     => $row->persen
                ]);
            }

            foreach (Tahsin::where('semester_id', $semester)->where('users_id', $siswa->id)->get() as $inc => $row) {
                array_push($tahsin, [
                    'tahsin_level'     => $row->level,
                    'tahsin_sk'     => $row->no_sk,
                    'tahsin_nilai'     => $row->nilai
                ]);
            }

            foreach (Karya::where('semester_id', $semester)->where('users_id', $siswa->id)->get() as $inc => $row) {
                array_push($karya, [
                    'karya_no'         => ($inc + 1),
                    'karya_tgl'     => $row->tgl,
                    'karya_judul'     => $row->judul,
                    'karya_nama'     => $row->media,
                    'karya_link'     => $row->link,
                ]);
            }

            foreach (Prestasi::where('semester_id', $semester)->where('users_id', $siswa->id)->get() as $inc => $row) {
                array_push($prestasi, [
                    'prestasi_no'             => ($inc + 1),
                    'prestasi_peringkat'     => $row->peringkat,
                    'prestasi_nama'         => $row->nama,
                    'prestasi_level'         => $row->level,
                    'prestasi_penyelenggara' => $row->penyelenggara_prestasi
                ]);
            }

            foreach (Org::where('semester_id', $semester)->where('users_id', $siswa->id)->get() as $inc => $row) {
                array_push($org, [
                    'organisasi_no'         => ($inc + 1),
                    'organisasi_nama'         => $row->nama,
                    'organisasi_jabatan'     => $row->jabatan,
                    'organisasi_masa'         => $row->masa_jabatan,
                ]);
            }

            foreach (Sosial::where('semester_id', $semester)->where('users_id', $siswa->id)->get() as $inc => $row) {
                array_push($sosial, [
                    'sosial_no'             => ($inc + 1),
                    'sosial_tgl'             => $row->tgl,
                    'sosial_nama'             => $row->nama,
                    'sosial_penyelenggara'    => $row->penyelanggara_sosial,
                ]);
            }

            foreach (Forum::where('semester_id', $semester)->where('users_id', $siswa->id)->get() as $i => $row) {
                array_push($forum, [
                    'forum_no'         => ($i + 1),
                    'forum_tgl'     => $row->tgl,
                    'forum_nama'     => $row->nama
                ]);
            }

            foreach (Nilai::where('semester_id', $semester)->where('users_id', $siswa->id)->get() as $i => $row) {
                array_push($nilai, [
                    'ipk_siswa'     => $row->ipk,
                    'ips_siswa'     => $row->ips,
                ]);
            }



            $ui->setImageValue('pasfoto_siswa', [
                'path' => auth()->user()->foto == NULL ? "https://discountdoorhardware.ca/wp-content/uploads/2018/06/profile-placeholder-3.jpg" : asset('img/') . '/' . auth()->user()->foto,
                'width' => 70,
                'height' => 60,
                'ratio' => false
            ]);

            $ui->setValues([
                'nama_siswa'     => $siswa->name,
                'nim_siswa'         => $siswa->nim,
                'email_siswa'    => $siswa->email,
                'alamat_siswa'  => $siswa->alamat,
                'telp_siswa'     => $siswa->hp,
                'angkatan_siswa' => $siswa->angkatan,
                'program_studi'     => $siswa->prodi,
                // 'ipk_siswa'     => $nilai->ipk,
                // 'ips_siswa'     => $nilai->ips,
                'semester'        => $semester,
                'thn_akademik'    => $siswa->angkatan
            ]);

            $ui->cloneRowAndSetValues('forum_no', $forum);
            $ui->cloneRowAndSetValues('ipk_siswa', $nilai);
            $ui->cloneRowAndSetValues('ips_siswa', $nilai);
            $ui->cloneRowAndSetValues('karya_no', $karya);
            $ui->cloneRowAndSetValues('sosial_no', $sosial);
            $ui->cloneRowAndSetValues('organisasi_no', $org);
            $ui->cloneRowAndSetValues('prestasi_no', $prestasi);
            $ui->cloneRowAndSetValues('mentor_nama', $mentor);
            $ui->cloneRowAndSetValues('tahsin_level', $tahsin);
            $ui->cloneRowAndSetValues('beasiswa_no', $beasiswa);


            header('Content-Disposition:attachment; filename=laporan.docx');
            $ui->saveAs('php://output');

            exit;
        }

        // Awal laporan beasiswa sdm ekspad 
        else {
            $ui         = new TemplateProcessor('exam4.docx');
            $siswa      = auth()->user();
            $semester    =  $request->semester_id;
            $forum       = [];
            $sosial        = [];
            $karya      = [];
            $org        = [];
            $prestasi    = [];
            $mentor        = [];
            $tahsin        = [];
            $beasiswa    = [];
            $nilai    = [];
            // $nilai        = Nilai::where('semester_id', $semester)->where('users_id', $siswa->id)->get();
            foreach (Beasiswa::where('semester_id', $semester)->where('users_id', $siswa->id)->get() as $inc => $row) {
                array_push($beasiswa, [
                    'beasiswa_no'     => $row->no_sertifikat,
                    'beasiswa_nama' => $row->nama,
                    'beasiswa_penyelenggara' => $row->penyelenggara,
                    'beasiswa_ket'     => $row->deskripsi,
                    'beasiswa_agenda'     => $row->agenda
                ]);
            }

            foreach (Mentoring::where('semester_id', $semester)->where('users_id', $siswa->id)->get() as $inc => $row) {
                array_push($mentor, [
                    'mentor_nama'         => $row->nama,
                    'mentor_pertemuan'     => $row->jml_pertemuan,
                    'mentor_kehadiran'     => $row->jml_kehadiran,
                    'mentor_percen'     => $row->persen
                ]);
            }

            foreach (Tahsin::where('semester_id', $semester)->where('users_id', $siswa->id)->get() as $inc => $row) {
                array_push($tahsin, [
                    'tahsin_level'     => $row->level,
                    'tahsin_sk'     => $row->no_sk,
                    'tahsin_nilai'     => $row->nilai
                ]);
            }

            foreach (Karya::where('semester_id', $semester)->where('users_id', $siswa->id)->get() as $inc => $row) {
                array_push($karya, [
                    'karya_no'         => ($inc + 1),
                    'karya_tgl'     => $row->tgl,
                    'karya_judul'     => $row->judul,
                    'karya_nama'     => $row->media,
                    'karya_link'     => $row->link,
                ]);
            }

            foreach (Prestasi::where('semester_id', $semester)->where('users_id', $siswa->id)->get() as $inc => $row) {
                array_push($prestasi, [
                    'prestasi_no'             => ($inc + 1),
                    'prestasi_peringkat'     => $row->peringkat,
                    'prestasi_nama'         => $row->nama,
                    'prestasi_level'         => $row->level,
                    'prestasi_penyelenggara' => $row->penyelenggara_prestasi
                ]);
            }

            foreach (Org::where('semester_id', $semester)->where('users_id', $siswa->id)->get() as $inc => $row) {
                array_push($org, [
                    'organisasi_no'         => ($inc + 1),
                    'organisasi_nama'         => $row->nama,
                    'organisasi_jabatan'     => $row->jabatan,
                    'organisasi_masa'         => $row->masa_jabatan,
                ]);
            }

            foreach (Sosial::where('semester_id', $semester)->where('users_id', $siswa->id)->get() as $inc => $row) {
                array_push($sosial, [
                    'sosial_no'             => ($inc + 1),
                    'sosial_tgl'             => $row->tgl,
                    'sosial_nama'             => $row->nama,
                    'sosial_penyelenggara'    => $row->penyelanggara_sosial,
                ]);
            }

            foreach (Forum::where('semester_id', $semester)->where('users_id', $siswa->id)->get() as $i => $row) {
                array_push($forum, [
                    'forum_no'         => ($i + 1),
                    'forum_tgl'     => $row->tgl,
                    'forum_nama'     => $row->nama
                ]);
            }

            foreach (Nilai::where('semester_id', $semester)->where('users_id', $siswa->id)->get() as $i => $row) {
                array_push($nilai, [
                    'ipk_siswa'     => $row->ipk,
                    'ips_siswa'     => $row->ips,
                ]);
            }



            $ui->setImageValue('pasfoto_siswa', [
                'path' => auth()->user()->foto == NULL ? "https://discountdoorhardware.ca/wp-content/uploads/2018/06/profile-placeholder-3.jpg" : asset('img/') . '/' . auth()->user()->foto,
                'width' => 70,
                'height' => 60,
                'ratio' => false
            ]);

            $ui->setValues([
                'nama_siswa'     => $siswa->name,
                'nim_siswa'         => $siswa->nim,
                'email_siswa'    => $siswa->email,
                'alamat_siswa'  => $siswa->alamat,
                'telp_siswa'     => $siswa->hp,
                'angkatan_siswa' => $siswa->angkatan,
                'program_studi'     => $siswa->prodi,
                // 'ipk_siswa'     => $nilai->ipk,
                // 'ips_siswa'     => $nilai->ips,
                'semester'        => $semester,
                'thn_akademik'    => $siswa->angkatan
            ]);

            $ui->cloneRowAndSetValues('forum_no', $forum);
            $ui->cloneRowAndSetValues('ipk_siswa', $nilai);
            $ui->cloneRowAndSetValues('ips_siswa', $nilai);
            $ui->cloneRowAndSetValues('karya_no', $karya);
            $ui->cloneRowAndSetValues('sosial_no', $sosial);
            $ui->cloneRowAndSetValues('organisasi_no', $org);
            $ui->cloneRowAndSetValues('prestasi_no', $prestasi);
            $ui->cloneRowAndSetValues('mentor_nama', $mentor);
            $ui->cloneRowAndSetValues('tahsin_level', $tahsin);
            $ui->cloneRowAndSetValues('beasiswa_no', $beasiswa);


            header('Content-Disposition:attachment; filename=laporan.docx');
            $ui->saveAs('php://output');

            exit;
        }
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
        //
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
        //
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
