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
        return view('intencoes',['type' => null, 'message' => null]);
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
        $type = null;
        $message = null;
        $data = $request->all();
        $data['data'] = dateToMySQL($request->data);
        
        if(Intention::create($data)){
            $type = "success";
            $message = "foi enviado com successo!!!";
        } else {
            $type = "error";
            $message = "Não pode ser concluida!!!";
        }

        return view('intencoes',['type'=> $type, 'message' => $message]);
    }
}
