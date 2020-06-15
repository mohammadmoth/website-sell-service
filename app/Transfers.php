<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfers extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "form_users_id", 'to_users_id', "projects_id", 'value'

    ];
}
