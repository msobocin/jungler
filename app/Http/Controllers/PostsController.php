<?php namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Input;
use Redirect;
use Conner\Tagging\Tag;

use Spatie\Activitylog\Models\Activity;
use App\User;
use App\Post;


use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PostsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::all();
		return view('posts.index', compact('posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(User $user)
	{
        return view('posts.create', compact('user'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        //$tagPattern =  '[A-Za-z0-9]';


        $input = Input::all();
        $input['user_id'] = Auth::user()->id;

        //preg_match_all('/<(.+?)[\s]*\/?[\s]*>/si', trim($input['content']), $tags);
        preg_match_all('/\#([a-z0-9_]+)/i', trim($input['content']), $tags);

        $post = Post::create( $input );

        $tags = array_unique($tags[1]);
        foreach ($tags as $tag){
            $post -> tag($tag);
        }

        return Redirect::route('posts.index')->with('message', 'Posts created');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Post $post)
	{
		return view('posts.show', compact('post'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Post $post)
	{
		return view('posts.edit', compact('post'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Post $post)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Post $post)
	{
		//
	}

    public function like(Post $post)
    {
        $userID = Auth::user()->id;

        if (!$post->liked($userID)) {
            $post->like($userID);
        }else {
            $post->unlike($userID);
        }

        return Redirect::route('posts.index')->with('message', 'Posts liked');
    }

}
