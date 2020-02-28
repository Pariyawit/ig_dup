<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $guarded = [];

	public function profileImage()
	{
		$imagePath = ($this->image) ? $this->image : 'profile/IEIz9NGyGZuv0I1EYcw4iAVmVkKQN1tTJRtItXCH.png';

		return '/storage/'.$imagePath;
	}

	public function follower(){
        return $this->belongsToMany(User::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
