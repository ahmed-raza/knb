<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdsRequest;
use App\Http\Requests\MessagesRequest;
use App\User;
use App\Ad;
use App\Image;
use Storage;
use Img;
use File;
use Auth;

class AdsController extends Controller
{
    public function __construct() {
      $this->middleware('auth', ['only'=>['create', 'edit']]);
      $this->middleware('ad', ['only'=>['edit', 'delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->search($request);
        }
        $ads = Ad::where('status', 1)->orderBy('created_at', 'desc')->paginate(3);
        return view('ads.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Ad::types();
        $makers = Ad::makers();
        $models = Ad::models();
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
        return redirect('ads')->with('message', 'Ad created but is not published yet, waiting for admin approval.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ad = Ad::findOrFail($id);
        return view('ads.show', compact('ad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = Ad::types();
        $makers = Ad::makers();
        $models = Ad::models();
        $ad = Ad::findOrFail($id);
        $year = \Carbon\Carbon::createFromTimestamp($ad->car_year)->format('Y-m-d');
        return view('ads.edit', compact('ad', 'types', 'makers', 'models', 'year'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdsRequest $request, $id)
    {
        $ad = Ad::findOrFail($id);
        if (!empty($request->input('default_images'))) {
            $images = Image::where('ad_id', $id)->whereNotIn('id', $request->input('default_images'));
            $images_to_delete = [];
            $thumbs_to_delete = [];
            foreach ($images->get() as $image) {
                $images_to_delete[] = 'ads/'.$id.'/'.$image->imageName;
                $thumbs_to_delete[] = 'ads/'.$id.'/thumb_'.$image->imageName;
            }
            Storage::delete($images_to_delete);
            Storage::delete($thumbs_to_delete);
            $images->delete();
        }
        if (!empty($request->file('images'))) {
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
        $request->merge(['car_year' => strtotime($request->input('car_year'))]);
        $ad->update($request->all());
        return redirect('ads/'.$id)->with('message', 'Ad updated.');
    }

    /**
     * Delete Confirmation view.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
      $ad = Ad::findOrFail($id);
      $route = route('ads.destroy', $id);
      $item = $ad->title;
      return view('partials.delete',compact('item', 'route'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $ad = Ad::findOrFail($id);
      Storage::deleteDirectory('ads/'.$id);
      $ad->images()->delete();
      $ad->delete();
      return redirect('ads')->with('message', 'Ad deleted');
    }

    public function adsMessage(MessagesRequest $request, $id){
      $ad = Ad::findOrFail($id);
      $request->request->add(['ad_id' => $id]);
      $request->request->add(['user_id' => $ad->user->id]);
      $ad->messages()->create($request->all());
      return redirect(route('ads.show', $id))->with('message', 'Message Sent.');
    }

    private function search($request){
        $title = $request->get('title');
        $types = $request->get('car_type');
        $makers = $request->get('car_make');
        $models = $request->get('car_model');
        $min_price = $request->get('min_price');
        $max_price = $request->get('max_price');
        $ads = Ad::where('title', 'like' , "%$title%");
        if (isset($makers)) {
            $ads->whereIn('car_make', $makers);
        }
        if (isset($models)) {
            $ads->whereIn('car_model', $models);
        }
        if (isset($types)) {
            $ads->whereIn('car_type', $types);
        }
        if (isset($min_price) && isset($max_price)) {
            $ads->whereBetween('car_price', [$min_price, $max_price]);
        }
        if (!empty($ads)) {
            $ads = $ads->orderBy('created_at', 'desc')->paginate(3);
            return view('ads.partials.results', compact('ads'))->render();
        } else {
            return false;
        }
    }
}
