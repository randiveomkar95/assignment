<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Country;
use App\State;
use App\City;

use carbon\carbon;

class UsersController extends Controller
{

    public $successStatus = 200;
    public function signUp(Request $request){

    	if($request->isMethod('post')){

                $input = $request->all();
                
                $input['password'] = md5($input['password']); 
                $name = $input['fname']; 
                $user = User::create($input); 
                $success['token'] =  $user->createToken('MyApp')-> accessToken; 
                $success['email'] =  $user->email;
                
                //REGISTRATION EMAIL NOTIFICATION
                $messageData = [
                    'email'=>$success['email'],
                    'name'=>$name,
                    
                ];

                $email = $success['email'];
                
                Mail::send('emails.register_notification',$messageData,function($message) use($email){
                    $message->to($email)->subject('Laravel Assignment - Registration Notification');
                });
               //REGISTRATION EMAIL NOTIFICATION END


                // return response()->json(['success'=>$success], $this-> successStatus);
                return redirect('/login')->with('flash_message_success','Account created successfully you can Sign In Now'); 
            }
            $country = Country::get();
            $state = State::get();
            $city = City::get();
            return view('signup')->with(compact('country','state','city'));
    	}

        public function login(Request $request)
        {
           return view('login');
        }

        public function fetchState(Request $request)
        {
            $data['states'] = State::where("country_id",$request->country_id)->get(["state", "id"]);
            return response()->json($data);
        }

        public function fetchCity(Request $request)
        {
            $data['cities'] = City::where("state_id",$request->state_id)->get(["city", "id"]);
            return response()->json($data);
        }

        public function signIn(Request $request)
        {   
            $data = $request->all();
            $username = $data['username'];
            $password = md5($data['password']);

            //Approch 1
            $data = [
            'email' => $request->email,
            'password' => md5($request->password)
            ];
     
            if (auth()->attempt($data)) {
                $token = auth()->user()->createToken('MyApp')->accessToken;
                return response()->json(['token' => $token], 200);
                } else {
                    return response()->json(['error' => 'Unauthorised'], 401);
                }

            //Approch 2
            // if(Auth::attempt(['username'=>$username,'password'=>$password])){
            //     dd('1');
            // }else{
            //     dd('2');
            // }

            //Approch 3
             // $user = User::where('username', $username)
             //      ->where('password',md5($password))
             //      ->first();
             // Auth::login($user);
             // dd('welcome');die;
             // return redirect('/welcome');

            //Approach 4    
            // if(Auth::attempt(['username' => $username, 'password' => $password])){ 
            //             $user = Auth::user(); 
            //             $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            //             $success['name'] =  $user->name;
               
            //             return $this->sendResponse($success, 'User login successfully.');
            //         } 
            //         else{ 
            //             return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
            //         } 

    
        }



                /**
             * success response method.
             *
             * @return \Illuminate\Http\Response
             */
            public function sendResponse($result, $message)
            {
                $response = [
                    'success' => true,
                    'data'    => $result,
                    'message' => $message,
                ];


                return response()->json($response, 200);
            }


            /**
             * return error response.
             *
             * @return \Illuminate\Http\Response
             */
            public function sendError($error, $errorMessages = [], $code = 404)
            {
                $response = [
                    'success' => false,
                    'message' => $error,
                ];


                if(!empty($errorMessages)){
                    $response['data'] = $errorMessages;
                }


                return response()->json($response, $code);
            }


}