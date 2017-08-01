<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdsRequest;
use App\User;
use App\Ad;
use Storage;
use Img;
use File;
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
        $types = $this->types();
        $makers = $this->makers();
        $models = $this->models();
        return view('ads.create', compact('types', 'makers', 'models'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdsRequest $request)
    {
        $request->merge(['car_year' => strtotime($request->input('car_year'))]);
        $ad = Auth::user()->ads()->create($request->all());
        if (!empty($request->file('images'))) {
            $image_ids = [];
            foreach ($request->file('images') as $key => $image) {
                $imageName = time() ."_($key)_". $image->getClientOriginalName();
                $imageThumb = "thumb_" . time() ."_($key)_". $image->getClientOriginalName();
                $imagePath = 'ads/' . $ad->id . '/' . $imageName;
                $upload = Storage::put($imagePath, File::get($image));
                if ($upload) {
                    Img::make(File::get($image))
                    ->resize(350, 232)
                    ->save(storage_path('app/ads/'.$ad->id.'/'.$imageThumb));
                }
                $ad->images()->create([
                    'ad_id'     => $ad->id,
                    'imageName' => $imageName,
                    'imagePath' => $imagePath,
                    ]);
            }
        }
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

    private function types(){
        return [
            'SUV'           => 'SUV',
            'Sedan'         => 'Sedan',
            'Minivan'       => 'Minivan',
            'Hatchback'     => 'Hatchback',
            'Convertible'   => 'Convertible',
        ];
    }

    private function makers(){
        return [
            'Honda'     => 'Honda',
            'Suzuki'    => 'Suzuki',
            'Nissan'    => 'Nissan',
            'Toyota'    => 'Toyota',
            'Daihatsu'  => 'Daihatsu',
        ];
    }

    private function models(){
        return [
            'Accord'        => 'Accord',
            'Baleno'        => 'Baleno',
            'Bolan'         => 'Bolan',
            'Charade'       => 'Charade',
            'City'          => 'City',
            'Civic'         => 'Civic',
            'Corolla GLi'   => 'Corolla GLi',
            'Corolla XLi'   => 'Corolla XLi',
            'Corona'        => 'Corona',
            'FX'            => 'FX',
            'Hilux'         => 'Hilux',
            'Khayber'       => 'Khayber',
            'Lancer'        => 'Lancer',
            'Mehran'        => 'Mehran',
            'N-One'         => 'N-One',
            'N-Wagon'       => 'N-Wagon',
            'Prado'         => 'Prado',
        ];
    }
}
