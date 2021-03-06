<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public $successStatus = 200;

    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $data['token'] =  $user->createToken('ng-client')->accessToken;
            return response()->json(['success' => true,'data'=>$data, 'code'=>200]);
        }
        else{
            return response()->json(['success' => false,'data'=>null, 'code'=>401]);
        }
    }

    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }

}