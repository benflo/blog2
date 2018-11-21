<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $table='Articles';
    protected $fillable = ['titre','contenu','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
