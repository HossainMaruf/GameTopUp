<?php

namespace App\Http\Controllers;

use Symfony\Component\Console\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;


class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    // LOGIN
    public function index(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = User::where('email', '=', $credentials['email'])->first(); 

        if(!$user) {
            $errors['email'] = 'User not found';
            return redirect()->back()->withInput()->withErrors(['email' => 'User not found!!!']);
        }

        if(!Hash::check($credentials['password'], $user->password)) {
            $errors['password'] = 'Password does not match';
            return redirect()->back()->withInput()->withErrors(['password' => 'Password does not match']);
        }

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        if(Auth::attempt($credentials)) {
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $value = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'password_confirmed' => $request->password_confirmed
        ]; 

        $user_exist = User::where('email', $value['email'])->get();
        if(count($user_exist) > 0) {
            return redirect()->back()->withInput()->withErrors(['message' => 'Email already exist']);
        }

        $rules = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:3|max:10',
            'password_confirmed' => 'required|same:password'
        ];

        $validator = Validator::make($value, $rules);
        if($validator->fails()) {
           return redirect()->back()->withInput()->withErrors($validator); 
        }
        $value['password'] = Hash::make($value['password']);
        $user = User::create($value);
        if(Auth::attempt(['email' => $value['email'], 'password' => $request->password])) {
            return redirect()->intended('/');
        } else return redirect()->intended('/register');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     Auth*
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function login() {
        if(Auth::user()) {
            return redirect()->intended('/');
        } else {
            return view('auth.login');
        }
    }

    public function register() {
        if(Auth::user()) {
           return redirect()->intended('/');
        } else {
           return view('auth.register');
        }
    }
    /**
     * Custom Function to prevent GET request to the 
     * Logout Route
     * @return [type] [description]
     */
    public function getLogout() {
        return redirect()->intended('/');
    }

    public function logout() {
        Session::flush();
        return redirect()->back();
    }
}
