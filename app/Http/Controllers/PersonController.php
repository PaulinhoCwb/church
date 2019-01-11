<?php

namespace App\Http\Controllers;

use App\Person;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

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
        $data = $request->all();

        $data['dateofbirth'] = dateToMySQL($request->dateofbirth);
        $data['zipcode'] = str_replace('-','',$request->zipcode);

        $person = Person::create($data);
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
        $person = Person::with(['dependents'])->where(['id' => $id])->first();
        return response()->json($person);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        
        $client = new Client();
        $res = $client->request('GET', $endPoint,
            [
                'verify' => false
            ]
        );
        $data = json_decode($res->getBody());
        return Response::json($data);
    }

    public function getTotal()
    {
        $personTotal = Person::all()->count();

        return Response::json($personTotal);
    }

    public function getOnePerson($id)
    {
        $person = Person::find($id);
        return Response::json($person);
    }

    public function getBirthdays()
    {
        $month = date('m');
        $sql = "SELECT name, dateofbirth FROM ";
        $sql .= "(SELECT name,dateofbirth FROM people UNION SELECT name, dateofbirth FROM dependents) AS PESSOAS";
        $sql .= " WHERE MONTH(dateofbirth) = ?";
        
        $res = DB::select($sql,[$month]);
        $persons = count($res);
        return Response::json($persons);
    }
}
