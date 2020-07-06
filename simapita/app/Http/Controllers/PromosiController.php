<?php

namespace App\Http\Controllers;


use App\Promosi;
use App\Wisata;
use Illuminate\Support\Facades\DB;
use App\Exports\PromosiExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PromosiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$wisata = DB::table('wisata')->get();
        // $promosi = Promosi::all();
    	return view('promosi', ['wisata' => $wisata]);
    }
    
	public function export_excel()
	{
		return Excel::download(new PromosiExport, 'promosi.xlsx');
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
     * @param  \App\Promosi  $promosi
     * @return \Illuminate\Http\Response
     */
    public function show(Promosi $promosi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Promosi  $promosi
     * @return \Illuminate\Http\Response
     */
    public function edit(Promosi $promosi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Promosi  $promosi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promosi $promosi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Promosi  $promosi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promosi $promosi)
    {
        //
    }
}
