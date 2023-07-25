<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthUsers extends Controller
{
    public function userauth()
    {
       
      
        
 
         
        if (Auth::user()) {
            
            $users = User::all();


            

            

                
                return $users;
            }
         else {
            
            return response()->json([
                'message' => 'User is not authenticated.',
            ], 401); 
        }
    }

        
        
    
        
        

    

}
