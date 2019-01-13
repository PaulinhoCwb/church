<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        if ($request->name && !$request->month) {
            $name = $request->name;
            $sql = "SELECT name, dateofbirth FROM ";
            $sql .= "(SELECT name,dateofbirth FROM people UNION SELECT name, dateofbirth FROM dependents) AS PESSOAS";
            $sql .= " WHERE name LIKE '".$name."%'";
            $persons =  DB::select($sql);
            return Response::json($persons);
        } elseif ($request->name && $request->month) {
            $sql = "SELECT name, dateofbirth FROM ";
            $sql .= "(SELECT name,dateofbirth FROM people UNION SELECT name, dateofbirth FROM dependents) AS PESSOAS";
            $sql .= " WHERE MONTH(dateofbirth) = ? AND name LIKE '%?%'";
        
            $persons =  DB::select($sql,[$request->month,$request->name]);
        
            return Response::json($persons);
        } else {
            $sql = "SELECT name, dateofbirth FROM ";
            $sql .= "(SELECT name,dateofbirth FROM people UNION SELECT name, dateofbirth FROM dependents) AS PESSOAS";
            $sql .= " WHERE MONTH(dateofbirth) = ?";
        
            $persons =  DB::select($sql,[$request->month]);
        
            return Response::json($persons);
        }
    }
}
