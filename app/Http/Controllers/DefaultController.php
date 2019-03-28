<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUsShipped;
use App\Intention;

class DefaultController extends Controller
{
    public function news()
    {
        return view('noticias');
    }

    public function warnings()
    {
        return view('avisos');
    }

    public function schedules()
    {
        return view('horarios');
    }

    public function catequese()
    {
        return view('catequese');
    }

    public function intentions()
    {
        return view('intencoes');
    }

    public function contactUs(Request $request)
    {
        \Mail::to('joaopaulocap10@gmail.com')->queue(new ContactUsShipped($request->nome,$request->mensagem));
    }

    public function massRequest()
    {
        
    }

    public function intentionsSave(Request $request)
    {
        $request->validate([
            
        ]);
        Intention::create($request->all());
    }
}
