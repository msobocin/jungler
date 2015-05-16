<?php namespace App;

use Lanz\Commentable\Commentable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {

	use \Conner\Tagging\TaggableTrait;
    use \Conner\Likeable\LikeableTrait;
    use Commentable;

    protected $guarded = [];

	public function user()
    {
        return $this->belongsTo('App\User');
    }

}
