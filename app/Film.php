<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Film extends Model
{
    public function profiles()
    {
        return $this->BelongsToMany('App\Profile');
    }


}
