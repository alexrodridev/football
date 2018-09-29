<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Seguidores;
use Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seg = Seguidores::where('user_id',Auth::id())->get();

        $user = User::find(1)->autorPost;
        foreach ($user as $r) {
            echo $r->id.'<br>';
        }
        //return view('sistema.home')
          //                  ->with(compact('posts'));
    }
}
