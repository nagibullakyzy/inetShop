<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(\Illuminate\Support\Facades\Auth::check()){

            return view('home');
        }
        else
            return redirect('/login');



    }
    public function update(Request $request, int $id)
    {
        $request->validate([
           'name' => 'required',
        'balance' => 'required',
               'profile_pic'  => 'required',

        ]);

        $user = \App\Models\User::where('id', $id)->first();
        $user->name = $request->name;
        $user->balance = $request->balance;
        $user->profile_pic = $request->profile_pic;
        $user->save(); //сохраняем



         return redirect()->route('home')
                        ->with('success','Profile updated successfully.');
    }
}
