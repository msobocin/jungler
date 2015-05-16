<?php namespace App;

use Lanz\Commentable\Commentable;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements SluggableInterface{

	use \Conner\Tagging\TaggableTrait;
    use \Conner\Likeable\LikeableTrait;
    use Commentable;
    use SluggableTrait;

    protected $guarded = [];

    protected $sluggable = array(
        'build_from' => 'content',
        'save_to'    => 'slug',
    );

	public function user()
    {
        return $this->belongsTo('App\User');
    }

}
