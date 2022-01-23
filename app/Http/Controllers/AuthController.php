<?php

namespace App\Http\Controllers;

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
    public function index(Request $request)
    {
        //
        $email = $request->old('email');
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)) {
            return redirect()->intended('/admin');
        }
       return redirect()->intended('/login');
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
            return redirect()->back()->withInput()->withErrors(['message' => 'user already taken']);
        }

        $rules = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_confirmed' => 'required|same:password'
        ];

        $validator = Validator::make($value, $rules);
        if($validator->fails()) {
           return redirect()->back()->withInput()->withErrors($validator); 
        }
        $value['password'] = Hash::make($value['password']);
        $user = User::create($value);
        if(Auth::attempt(['email' => $value['email'], 'password' => $request->password])) {
            return redirect()->intended('/admin');
        } else return redirect()->intended('/');
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
        return view('auth.login');
    }

    public function register() {
        return view('auth.register');
    }
    public function logout() {
        Session::flush();
        return redirect() -> intended('/');
    }
}
