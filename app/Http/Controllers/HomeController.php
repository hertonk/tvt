<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
        $id = \Auth::user()->id;
        $user = User::find($id);

        if($user->hasRole('manager')) {

            return redirect('/projects/list');

        } elseif ($user->hasRole('analist')){

            return redirect('/projects/list');

        } elseif ($user->hasRole('developer')){

            return redirect('/projects/list');

        }
    }
}
