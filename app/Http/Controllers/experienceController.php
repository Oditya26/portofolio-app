<?php

namespace App\Http\Controllers;

use App\Models\riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class experienceController extends Controller
{
    private $_tipe;

    function __construct() {
        $this-> _tipe = 'experience';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = riwayat::where('tipe', $this-> _tipe)->orderBy('tgl_akhir', 'desc')->get();
        return view('dashboard.experience.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.experience.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('judul', $request->tittle);
        Session::flash('info1', $request->info1);
        Session::flash('tgl_mulai', $request->tgl_mulai);
        Session::flash('tgl_akhir', $request->tgl_akhir);
        Session::flash('isi', $request->content);

        $request->validate(
            [
                'tittle' => 'required',
                'info1' => 'required',
                'tgl_mulai' => 'required',
                'content' => 'required',
            ], [
                'tittle.required' => 'Tittle cant be empty',
                'info1.required' => 'Company Name cant be empty',
                'tgl_mulai.required' => 'Start Date cant be empty',
                'content.required' => 'Content cant be empty',
            ]
        );
        
        $data = [
            'judul' => $request->tittle,
            'info1' => $request->info1,
            'tipe' => $this-> _tipe,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
            'isi' => $request->content,
        ];

        riwayat::create($data);

        return redirect()->route('experience.index')->with('success', 'Add Data Experience Successfully!');
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
        $data = riwayat::where('id', $id)->where('tipe', $this-> _tipe)->first();
        return view('dashboard.experience.edit')->with('data', $data);
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
        $request->validate(
            [
                'tittle' => 'required',
                'info1' => 'required',
                'tgl_mulai' => 'required',
                'content' => 'required',
            ], [
                'tittle.required' => 'Tittle cant be empty',
                'info1.required' => 'Company Name cant be empty',
                'tgl_mulai.required' => 'Start Date cant be empty',
                'content.required' => 'Content cant be empty',
            ]
        );
        
        $data = [
            'judul' => $request->tittle,
            'info1' => $request->info1,
            'tipe' => $this-> _tipe,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
            'isi' => $request->content,
        ];

        riwayat::where('id', $id)->where('tipe', $this-> _tipe)->update($data);

        return redirect()->route('experience.index')->with('success', 'Update Data Experience Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        riwayat::where('id', $id)->where('tipe', $this-> _tipe)->delete();
        return redirect()->route('experience.index')->with('success', 'Delete Data Experience Successfully!');
    }
}
