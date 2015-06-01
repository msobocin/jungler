<?php namespace App\Http\Controllers;


use Carbon\Carbon;
use Conner\Likeable\LikeCounter;
use Conner\Tagging\Tag;

use Input;
use Redirect;
use App\Post;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HottiesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $tags = Tag::orderBy('count', 'desc')->take(25)->get();


        $posts = Post::where('created_at', '>=', Carbon::now()->subMinutes(720))->whereLikedAll()->with('likeCounter')->get();
        $posts = $posts->sortBy('likeCounter.count');

//        foreach($likes as $like){
//            array_push($posts, Post::where('likable_id',$like->likable_id));
//        }

        return view('hotties.index', compact('posts','tags'));
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
	public function store()
	{
		//
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

    public function scopeWhereLikedAll($query, $userId=null)
    {
        return $query->whereHas('likes', function($q) use($userId) {
            $q->where('user_id', 'like', '%');
        });
    }

}
