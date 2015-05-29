<?php namespace App;

use Carbon\Carbon;
use Lanz\Commentable\Commentable;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
//use Spatie\Activitylog\LogsActivityInterface;
//use Spatie\Activitylog\LogsActivity;

use Illuminate\Database\Eloquent\Model;

class Post extends Model implements SluggableInterface {

	use \Conner\Tagging\TaggableTrait;
    use \Conner\Likeable\LikeableTrait;
    use Commentable;
    use SluggableTrait;
    //use LogsActivity;

    protected $guarded = [];

    protected $sluggable = array(
        'build_from' => 'SlugName',
        'max_length'      => 125,
        'save_to'    => 'slug',
    );

    public function getSlugNameAttribute()
    {
        return Carbon::now() . '-' . $this->content;
    }

	public function user()
    {
        return $this->belongsTo('App\User');
    }

/*    public function getActivityDescriptionForEvent($eventName)
    {
        if ($eventName == 'created')
        {
            return $this;
        }

        if ($eventName == 'updated')
        {
            return $this;
        }

        if ($eventName == 'deleted')
        {
            return $this;
        }

        return '';
    }*/

}
