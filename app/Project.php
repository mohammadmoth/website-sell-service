<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "users_id", 'name', 'json',  'filespath', "isfinsh", "cost", "freelancer_id"

    ];
}
