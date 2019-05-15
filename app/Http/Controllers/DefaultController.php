<?php

namespace App\Http\Controllers;

use PDF;
use App\News;
use App\Intention;
use Illuminate\Http\Request;
use App\Mail\ReceiveShipped;
use App\Mail\ContactUsShipped;

class DefaultController extends Controller
{
    public function news()
    {
        $noticias = News::where('tipo',1)->orderBy('id','ASC')->get();
        return view('noticias',['noticias' => $noticias]);
    }

    public function warnings()
    {
        $avisos = News::where('tipo',2)->orderBy('id','ASC')->get();
        return view('avisos',['avisos',$avisos]);
    }

    public function schedules()
    {
        return view('horarios');
    }

    public function catequese() 
    {
        $catequese = News::where('tipo',3)->orderBy([])->get();
        // dd($catequese);
        return view('catequese',['avisos' => $catequese]);
    }

    public function intentions()
    {
        return view('intencoes',['type' => null, 'message' => null]);
    }

    public function contactUs(Request $request)
    {
        \Mail::to('joaopaulocap10@gmail.com')->queue(new ContactUsShipped($request->nome,$request->mensagem));
        \Mail::to($request->email)->queue(new ReceiveShipped($request->nome)); 
         
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

    public function list()
    {
        $data = \App\Intention::whereDate('data',now())->orderBy('type');
        $pdf = PDF::loadView('PDF/missas', ['intencoes' => $data]);
        return $pdf->download('missas.pdf'); 
    }
}
