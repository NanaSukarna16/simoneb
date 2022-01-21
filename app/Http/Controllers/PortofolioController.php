<?php

namespace App\Http\Controllers;

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


class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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

        return view('portofolio.index', [
            'jumlah' => $jumlah, 'jumlah2' => $jumlah2, 'jumlah3' => $jumlah3, 'jumlah4' => $jumlah4,
            'jumlah5' => $jumlah5, 'jumlah6' => $jumlah6, 'jumlah7' => $jumlah7, 'jumlah8' => $jumlah8,
            'jumlah9' => $jumlah9
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
