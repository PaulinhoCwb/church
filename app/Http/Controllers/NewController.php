<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Http\Resources\News as NewsResource;

class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return NewsResource::collection(News::paginate(10));
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
        $this->validate($request, [
            'tipo' => 'required',
            'titulo' => 'required',
            'body' => 'required',
            'photo' => 'required'
        ]);
        $data = $request->all();
        if($request->photo){
            $name = time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];
            \Image::make($request->photo)->resize(150,150, function ($constraint){
                // $constraint->aspectRatio();
            })->save(public_path('img/media/').$name);
            \Image::make($request->photo)->resize(700,200, function ($constraint){
                // $constraint->aspectRatio();
            })->save(public_path('img/longa/').$name);

            $data['photo'] = $name;
        }

        $user = Auth::guard('api')->user();

        $data['user_id'] = $user->id;
        $news = News::create($data);

        return Response::json($news);
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
        if(News::destroy($id)) {
            return response()->json(['deleted' => true]);
        } else {
            return response()->json(['deleted' => false]);
        }
    }
}
