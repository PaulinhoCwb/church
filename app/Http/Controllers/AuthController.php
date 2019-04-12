<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;
use App\Http\Resources\Person as PersonResource;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $http = new \GuzzleHttp\Client(['base_uri' => 'https://www.santuariosantateresinha41.com.br']);
        
        try {
            $response = $http->post('/oauth/token',[
                'form_params' => [
                     'grant_type' => 'password',
                     'client_id' => 2,
                     'client_secret' => 'uD2jbCXzWGAiNNMkbk4hYJAav1sqlOu4ceHELyGG',
                     'username' => $request->username,
                     'password' => $request->password,
                 ],
             ]);
            return json_decode((string) $response->getBody(), true);
            // // dd((string)$response->getBody());
            //  return response()->json((string)$response->getBody(),200,[],1);
        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            if($e->getCode() == 400) {
                return response()->json('Invalid request', $e->getCode());
            } else if ($e->getCode() == 401) {
                return response()->json('Suas credencias estão incorretas', $e->getCode());
            }
        
           return response()->json('Erro no servidos',$e->getCode());
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }
    
    public function logout()
    {
        auth()->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });
        return response()->json('Logged out successfully', 200);
    }
}
