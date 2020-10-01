<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [];
    
    public function user()
    {
        return $this->belongsTo("App\User"); 
    }
    
    public function films()
    {
        return $this->hasMany("App\Film");
    }
}
