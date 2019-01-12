<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tithe;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
// use Illuminate\Http\Response;

class TitheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persons = DB::table('people')->select('id','name')->get();
        return Response::json($persons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tithes = Tithe::all();
        $sum = $tithes->sum('money_value');
        dd($sum);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'paid_at'=> 'required',
            'money_value'=> 'required'
        ]);
        
        // dd($request);
        $data = $request->all();

        if ($data['people_id']['id']) {
            $data['people_id'] = $data['people_id']['id'];
        }
        
        $data['paid_at'] = dateToMySQL($request->paid_at);
        
        $tithe = Tithe::create($data);

        return Response::json($tithe); 
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

    public function getTotalTithe()
    {
        $tithes = Tithe::all();
        $sum = number_format($tithes->sum('money_value'),2,',','.');
        return Response::json($sum);
    }
}
