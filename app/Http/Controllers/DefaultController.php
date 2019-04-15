<?php

namespace App\Http\Controllers;

use App\News;
use App\Intention;
use App\Mail\ReceiveShipped;
use Illuminate\Http\Request;
use App\Mail\ContactUsShipped;
use Illuminate\Support\Facades\Mail;
use function GuzzleHttp\Promise\queue;

class DefaultController extends Controller
{
    public function news()
    {
        $noticias = News::where('tipo',1)->orderBy('id','ASC')->get();
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
        \Mail::to('joaopaulocap10@gmail.com')->queue(new ContactUsShipped($request->nome,$request->mensagem));
        // \Mail::to($request->email)->queue(new ReceiveShipped($request->nome)); 
         
        if (\Mail::failures()) {
            return response()->json(['msg' => false]);
        } 

        return response()->json(['msg' => true]);
        
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
