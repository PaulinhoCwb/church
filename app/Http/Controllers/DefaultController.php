<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUsShipped;
use App\Intention;
use function GuzzleHttp\Promise\queue;
use App\News;

class DefaultController extends Controller
{
    public function news()
    {
        $noticias = News::where('tipo',1);
        return view('noticias',['noticias' => $noticias]);
    }

    public function warnings()
    {
        $avisos = News::where('tipo',2);
        return view('avisos',['avisos',$avisos]);
    }

    public function schedules()
    {
        return view('horarios');
    }

    public function catequese() 
    {
        $catequese = News::where(3);
        return view('catequese',['catequese' => $catequese]);
    }

    public function intentions()
    {
        return view('intencoes',['type' => null, 'message' => null]);
    }

    public function contactUs(Request $request)
    {
        \Mail::to('parstateresinhactba@gmail.com')->queue(new ContactUsShipped($request->nome,$request->mensagem));
        \Mail::to($request->email)->queue(new ReceiveShipped($request->name));
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
