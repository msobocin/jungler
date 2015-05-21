<?php namespace App\Http\Controllers;

use App\User;
use App\Post;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Input;
use Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UsersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

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
	public function show(User $user)
	{
//        $latestActivities = Activity::with('user')->latest()->limit(100)->get();
        /*$posts = Post::whereHas('comments', function($q)
        {
            $q->where('user_id', '=', 1);

        })->get();*/
        $user_id = $user->id;
        $postsComments = Post::whereHas('comments', function($comment) use ($user_id) {
            $comment->where('user_id', "=" ,$user_id);
        })->get();
        $posts = $user->posts;
        $posts = $posts -> merge($postsComments);
        return view('users.show', compact('user','posts'));
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
	public function update(User $user)
	{
        $input = array_except(Input::all(), '_method');
        $user->update($input);

        return Redirect::route('users.show', $user->slug)->with('message', 'User updated.');
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
