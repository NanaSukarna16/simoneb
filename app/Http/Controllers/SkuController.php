<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SKU;
use Illuminate\Support\Facades\File;

class SkuController extends Controller
{
    public $new_sku;
    public function __construct()
    {
        $this->new_sku = new SKU();
    }
    public function index()
    {

        return view('sku.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sku.create');
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
            'file' => "required|mimes:pptx,docx,xlsx|"
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong",
            'min' => ":attribute karakter terlalu pendek",
            'max' => ":attribute karakter terlalu panjang / ukuran terlalu besar",
            'mimes' => ":attribute Ektensi error, gunakan .pptx atau .docx dan .xlsx"
        ];

        $this->validate($request, $rules, $messages);
        $nm = $request->file;

        $namaFile = $nm->getClientOriginalName();

        $this->new_sku->file = $namaFile;
        $this->new_sku->users_id = $request->user;


        $nm->move(public_path() . '/storage/sku', $namaFile);
        $this->new_sku->save();

        return redirect()->route('sku')->with('status', 'SKU successfully created');
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
        $sku_edit = SKU::find($id);

        return view('sku.edit', [
           'sku' => $sku_edit
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
            'file' => "required|mimes:pptx,docx,xlsx|"
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong",
            'min' => ":attribute karakter terlalu pendek",
            'max' => ":attribute karakter terlalu panjang / ukuran terlalu besar",
            'mimes' => ":attribute Ektensi error, gunakan .pptx atau .docx dan .xlsx"
        ];

        $sku_edit = SKU::find($id);
        $fileLama = $sku_edit->file;

        if (!$request->file) {
            $sku_edit->file = $fileLama;
        } else {

            if ($request->file != $fileLama) {
                $nm = $request->file;

                $namaFile = $nm->getClientOriginalName();
                $sku_edit->file = $namaFile;

                $nm->move(public_path() . '/storage/sku', $namaFile);
            } else {
                $request->file->move(public_path() . '/storage/sku', $fileLama);
            }
        }
        $sku_edit->users_id = $request->user;
        $sku_edit->save();

        return redirect()->route('sku')->with('status', 'SKU successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sku_hapus = SKU::findOrFail($id);
        $image_path = "storage/sku/" . $sku_hapus->file;

        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $sku_hapus->delete();
        return redirect()->route('sku')->with('status', 'SKU successfully deleted');
    }
}
