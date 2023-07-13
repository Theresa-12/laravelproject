<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    
    public function createuser(Request $request)
    {
        try{
            $validateUser=Validator::make($request->all(),[
                'name'=>'required',
                'password'=>'required',
                'mail'=>'required',
            ]);
            if($validateUser->fails()){
                return response()->json([
                    'status' =>false,
                    'message'=>'validation error',
                    'error' =>$validateUser->errors()
                
                ],401);
            }
            $user = User::create([
                'name'=>$request->name,
                'mail'=>$request->mail,
                'password'=>Hash::make($request->password)
            ]);

            return response()->json([
                'status'=>true,
                'message'=>'User created successfully',
                'token'=>$user->createToken("API TOKEN")->plainTextToken
            ],200);
        }catch(\Throwable $th)
        {
            return response()->json([
                'status'->false,
                'message'->$th->getMessage()
            ],500);
        }

    }
    public function loginUser(Request$request)
    {
        try{
            $validateUser=Validator::make($request->all(),[
                'mail'=>'required',
                'password'=>'required'

            ]);
            if($validateUser->fails())
            {
                return response()->json(
                    [
                        'status'=>false,
                        'message'=>'validation error',
                        'errors'=>$validateUser->errors()
                    ],401
                );

            }
            if(!Auth::attempt($request->only(['password','mail'])))
            {
                return response()->json(
                    [
                        'status'=>false,
                        'message'=>'Email  or password does not match with our record'
                    ],401
                );

            }
            $user=User::where('mail',$request->mail)->first();
            return response()->json([
                'status'=>true,
                'message'=>'User created successfully',
                'token'=>$user->createToken("API TOKEN")->plainTextToken
            ],200);
        }
        catch(\Throwable $th){
            return response()->json([
                'status'->false,
                'message'->$th->getMessage()
            ],500);

        }

       
    }
}
