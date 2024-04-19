<?php

namespace App\Http\Controllers;

use App\Models\halaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class halamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = halaman::orderBy('judul', 'asc')->get();
        return view('dashboard.halaman.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.halaman.create');
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
        Session::flash('isi', $request->content);

        $request->validate(
            [
                'tittle' => 'required',
                'content' => 'required',
            ], [
                'tittle.required' => 'Tittle cant be empty',
                'content.required' => 'Content cant be empty',
            ]
        );
        
        $data = [
            'judul' => $request->tittle,
            'isi' => $request->content,
        ];

        halaman::create($data);

        return redirect()->route('halaman.index')->with('success', 'Add Data Successfully!');
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
        $data = halaman::where('id', $id)->first();
        return view('dashboard.halaman.edit')->with('data', $data);
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
                'content' => 'required',
            ], [
                'tittle.required' => 'Tittle cant be empty',
                'content.required' => 'Content cant be empty',
            ]
        );
        
        $data = [
            'judul' => $request->tittle,
            'isi' => $request->content,
        ];

        halaman::where('id', $id)->update($data);

        return redirect()->route('halaman.index')->with('success', 'Update Data Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        halaman::where('id', $id)->delete();
        return redirect()->route('halaman.index')->with('success', 'Delete Data Successfully!');
    }
}
