<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Input;
use Redirect;
use App\User;
use App\Post;
use Lanz\Commentable\Comment;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CommentsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$commnets = Comment::all();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Post $post)
	{
        //$postAux = Post::find($post->id);
        //$input = Input::all();
        //$input['user_id'] = Auth::user()->id;
        //$input = Input::all();
        //$input['user_id'] = Auth::user()->id;
        //Comment::create( $input );
        $comment = new Comment;
        $comment->body = Input::get('body');
        $comment->user_id = Auth::user()->id;
        //$comment = Comment::create( $input, Auth::user()->id );
        //$comment->user_id = Auth::user()->id;


        //echo var_dump($post->slug);
        //$postAux->comments()->save($comment);
        Post::find($post->id)->comments()->save($comment);

        return Redirect::route('posts.index')->with('message', 'Comentario creado');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
