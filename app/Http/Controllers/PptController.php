<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PPT;
use Illuminate\Support\Facades\File;

class PptController extends Controller
{
    public $new_ppt;
    public function __construct()
    {
        $this->new_ppt = new PPT();
    }
    public function index()
    {

        return view('ppt.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ppt.create');
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
            'file' => "required|mimes:pptx|"
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong",
            'min' => ":attribute karakter terlalu pendek",
            'max' => ":attribute karakter terlalu panjang / ukuran terlalu besar",
            'mimes' => ":attribute Ektensi error, gunakan .pptx"
        ];

        $this->validate($request, $rules, $messages);
        $nm = $request->file;

        $namaFile = $nm->getClientOriginalName();

        $this->new_ppt->file = $namaFile;
        $this->new_ppt->users_id = $request->user;


        $nm->move(public_path() . '/storage/ppt', $namaFile);
        $this->new_ppt->save();

        // dd($request->all());

        return redirect()->route('ppt')->with('status', 'PPT successfully created');
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
        $ppt_edit = PPT::find($id);

        return view('ppt.edit', [
           'ppt' => $ppt_edit
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
            'file' => "required|mimes:pptx|"
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong",
            'min' => ":attribute karakter terlalu pendek",
            'max' => ":attribute karakter terlalu panjang / ukuran terlalu besar",
            'mimes' => ":attribute Ektensi error, gunakan .pptx"
        ];

        $ppt_edit = PPT::find($id);
        $fileLama = $ppt_edit->file;

        if (!$request->file) {
            $ppt_edit->file = $fileLama;
        } else {

            if ($request->file != $fileLama) {
                $nm = $request->file;

                $namaFile = $nm->getClientOriginalName();
                $ppt_edit->file = $namaFile;

                $nm->move(public_path() . '/storage/ppt', $namaFile);
            } else {
                $request->file->move(public_path() . '/storage/ppt', $fileLama);
            }
        }
        $ppt_edit->users_id = $request->user;
        $ppt_edit->save();

        return redirect()->route('ppt')->with('status', 'PPT successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ppt_hapus = PPT::findOrFail($id);
        $image_path = "storage/ppt/" . $ppt_hapus->file;

        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $ppt_hapus->delete();
        return redirect()->route('ppt')->with('status', 'PPT successfully deleted');
    }
}
