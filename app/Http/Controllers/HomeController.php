<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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
		$posts = DB::table('post')
			->join('users', 'users.id', '=', 'post.author_post')
			->join('seguidores', 'seguidores.followed_id', '=', 'post.author_post')
			->select('post.*', 'users.id', 'users.name', 'users.lname')
			->where('seguidores.user_id',Auth::id())
			->orderBy('post.created_at', 'desc')
			->get();
		return view('sistema.home')
							->with(compact('posts'));
	}
}