<?php

namespace App\Http\Controllers;

use App\Person;
use Carbon\Carbon;
use App\Dependent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Http\Resources\Person as PersonResource;
use App\Http\Resources\Dependent as DependentResource;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Person::with('father')->paginate(10));
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
        // $person = Person::with(['dependents'])->where(['id' => $id])->first();
        // return response()->json($person);
        return new PersonResource(Person::findOrFail($id));
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
        $this->validate($request, [
            'name' => 'required',
            'dateofbirth' => 'required',
            'zipcode' => 'required',
            'address' => 'required',
            'number' => 'required',
            'email' => 'required',
            'cellphone' => 'required',
        ]);
        $person = Person::findOrFail($id);

        $data = $request->all();

        $data['dateofbirth'] = dateToMySQL($request->dateofbirth);
        $data['zipcode'] = str_replace('-','',$request->zipcode);

        if ($person->update($data)) {
            return response()->json(['updated' => true]);
        } else {
            return response()->json(['updated' => false]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Person::destroy($id)) {
            return response()->json(['deleted' => true]);
        } else {
            return response()->json(['deleted' => false]);
        }
    }

    public function getTotal()
    {
        $personTotal = Person::all()->count();
        $marriageTotal = Dependent::whereMonth('weddingdata',now()->format('m'))->count();

        $month = date('m');
        $sql = "SELECT name, dateofbirth FROM ";
        $sql .= "(SELECT name,dateofbirth FROM people UNION SELECT name, dateofbirth FROM dependents) AS PESSOAS";
        $sql .= " WHERE MONTH(dateofbirth) = ?";
        
        $res = DB::select($sql,[$month]);
        $persons = count($res);

        return Response::json(
            [
                'totalPerson' => $personTotal,
                'totalMarriage' => $marriageTotal,
                'totalBirthday' => $persons
            ]
        );
    }

    public function getOnePerson($id)
    {
        $person = Person::find($id);
        return Response::json($person);
    }

    public function getWeeding () {
        $casal = Dependent::with(['people'])->whereMonth('weddingdata',now()->format('m'))->get();
        return response()->json($casal);
    }

    public function personBirthddays()
    {
        $month = date('m');
        $sql = "SELECT name, dateofbirth FROM ";
        $sql .= "(SELECT name,dateofbirth FROM people UNION SELECT name, dateofbirth FROM dependents) AS PESSOAS";
        $sql .= " WHERE MONTH(dateofbirth) = ?";
        
        $res = DB::select($sql,[$month]);
        return response()->json($res);
    }

    public function getTodos()
    {
        return PersonResource::collection(Person::all());
    }

    public function test()
    {
        $person = Person::with('father')->get();
        return response()->json(Person::with('father')->paginate(10));
        // return response()->json($person);
    }
}
