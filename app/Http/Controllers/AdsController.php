<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdsRequest;
use App\User;
use App\Ad;
use Auth;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ad::all();
        return view('ads.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $years = $this->years();
        $models = $this->models();
        return view('ads.create', compact('years', 'models'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdsRequest $request)
    {
        $ads = Auth::user()->ads()->create($request->all());
        return redirect('ads')->with('message', 'Ad created.');
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

    private function years(){
        $year=[];
        for ($i=date('Y'); $i > '1940' ; $i--) { 
            $year[$i] = $i;
        }
        return [''=>'-Select-'] + $year;
    }

    private function models(){
        return [
            'Accord',
            'Baleno',
            'Bolan',
            'Charade',
            'City',
            'Civic',
            'Corolla GLi',
            'Corolla XLi',
            'Corona',
            'FX',
            'Hilux',
            'Khayber',
            'Lancer',
            'Mehran',
            'N-One',
            'N-Wagon',
            'Prado',
        ];
    }
}
