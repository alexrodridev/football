<?php

namespace App\Http\Controllers\Sistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Auth;

class PostController extends Controller
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
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$post = Post::where('author_post', Auth::id())
												->orderBy('created_at', 'desc')
													->get();
		return view('sistema.posts')->with(compact('post'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('sistema.create_post');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$post = new Post;
		$post->author_post = Auth::id();
		$post->text_post = $request->text_post;
		if ($request->fv_post == 'v')
		{
			parse_str( parse_url( $request->video_post, PHP_URL_QUERY ), $id_video );
			$post->video_post = $id_video['v'];
		}
		elseif($request->fv_post == 'f')
		{
			if ($request->hasFile('image_post') && $request->file('image_post')->isValid()) {
				
				$extention = $request->file('image_post')->extension();
				
				$nameImage = Auth::id().'_'.date("Ymd_His").'.'.$extention;

				$post->image_post = $nameImage;

				$upload = $request->file('image_post')->storeAs('posts/'.Auth::id(), $nameImage);

				if (!$upload)
					return redirect()
											->back()
													->with('msg_danger','Falha ao fazer o upload da imagem!');

			}
		}
		//dd($post);
		$post->save();
		return redirect()
							->route('posts.create')
									->with('msg_success','Você criou seu post, crie uma nova postagem!');
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
		$post = Post::where('id_post',$id)->get();
		return view('sistema.edit_post')->with(compact('post'));
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
		if ($request->fv_post == 'v')
		{
			parse_str( parse_url( $request->video_post, PHP_URL_QUERY ), $id_video );
			$video = $id_video['v'];
			$image = null;	
		}
		elseif($request->fv_post == 'f')
		{
			$video = null;
			if (!$request->image) {
				$extention = $request->file('image_post')->extension();
				$nameImage = Auth::id().'_'.date("Ymd_His").'.'.$extention;
				$request->file('image_post')->storeAs('posts/'.Auth::id(), $nameImage);
				$image = $nameImage;
			} else {
				$img = Post::where('id_post',$id)->get();
				$image = $img[0]->image_post;
			}
		}
		$post = Post::where('id_post',$id)->update([
			'text_post' => $request->text_post,
			'video_post' => $video,
			'image_post' => $image
		]);
		return redirect()->route('posts.edit',$id)
					->with('msg_success','Você atualizou o seu post, crie uma nova postagem!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		Post::where('id_post', $id)->delete();
		return redirect()->route('posts.index')
					->with('msg_danger','Você excluiu o seu post, crie uma nova postagem!');
	}
}