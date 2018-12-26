<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use function GuzzleHttp\json_encode;
use Illuminate\Support\Facades\Response;
use App\Person;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Person::latest('id')->paginate(10);
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
            'name' => 'required',
            'dateofbirth' => 'required',
            'zipcode' => 'required',
            'address' => 'required',
            'number' => 'required',
            'email' => 'required',
            'cellphone' => 'required',
        ]);
        
        $person = Person::create($request->all());
        return Response::json($person);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Person::find();
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

    public function getCep(Request $request)
    {
        $cep = $request->get('zipcode');
        $endPoint = "https://viacep.com.br/ws/".$cep."/json/";
        #print_r($endPoint); die;
        $client = new Client();
        $res = $client->request('GET', $endPoint);
        $data = json_decode($res->getBody());
        return Response::json($data);
    }

}
