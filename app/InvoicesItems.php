<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoicesItems extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "invoices_id", 'cost', 'items_id', "count", "deceptions"

    ];
}
