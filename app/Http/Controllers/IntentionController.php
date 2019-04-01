<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Intention;
use App\Http\Resources\Intention as IntentionResource;

class IntentionController extends Controller
{
    public function index()
    {
        return IntentionResource::collection(Intention::paginate(10));
    }
}
