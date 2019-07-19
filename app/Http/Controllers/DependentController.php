<?php

namespace App\Http\Controllers;

use App\Dependent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class DependentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'name' => 'required',
            'type' => 'required',
        ]);
        
        $data = $request->all();
        
        if($request->type == 'E'){
            $data['spouse_id'] = auth('api')->user()->id;
        }

        if ($request->type == 'F') {
            $data['father_id'] = auth('api')->user()->id;
        }

        if ($request->dateofbirth) {
            $data['dateofbirth'] = dateToMySQL($request->dateofbirth); 
        }
        if ($request->weddingdata && $request->weddingdata !== null) {
            $data['weddingdata'] = dateToMySQL($request->weddingdata); 
        }

        $person = Person::find($request->people_id);
        $data['zipcode'] = $person->zipcode;
        $data['address'] = $person->address;
        $data['number'] = $person->number;
        $data['email'] = $person->email;
        $data['tellphone'] = $person->tellphone;
        $data['cellphone'] = $person->tellphone;
        $data['publicplace'] = $person->tellphone;

        $dependent = Person::create($data);
        return Response::json($dependent);
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

    public function weedingBirthDay()
    {
        $month = date('m');
        $dependents = Dependent::whereMonth('weddingdata',$month)->get();

        return Response::json($dependents->count());
    }
}
