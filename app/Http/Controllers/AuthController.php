<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\JWT;

class AuthController extends Controller
{
   
    public function login(Request $r){
        $this->validate($r,
         ['username' => 'required', 
         'password' => 'required'
        ]); 

        $u = User::where('username', $r ->username)->first();// obtener el username

        if (!Hash::check($r->password, $u->password)) {// check credentials 
            return response()->json(['msg' => 'error'],401);
        }

        $token = JWT::create($u, env('JWT_SECRET_KEY'), env('JWT_EXPIRE'));

        return response()->json(['user'=>$u, 'token'=>$token]);
    }
}