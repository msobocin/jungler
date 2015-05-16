<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

	use \Conner\Tagging\TaggableTrait;
    use \Conner\Likeable\LikeableTrait;

    protected $guarded = [];

	public function user()
    {
        return $this->belongsTo('App\User');
    }

}
