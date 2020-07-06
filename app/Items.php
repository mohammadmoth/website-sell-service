<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Items extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "name", 'deceptions', 'deceptionsLong', 'image', 'cost', 'json'

    ];


    public static function GetMyMoneyItem($update = false)
    {
        if ($update)
            $id = null;
        else
            $id =  Cache::get("IdItemOfGetMyMoney", null);

        if ($id == null) {
            $items =  Items::Get();
            foreach ($items as $item) {
                $item->jsondata =   json_decode($item->json);
                if (!$item->jsondata)
                    continue;
                if (isset($item->jsondata->getmoneyitem)) {
                    $id = $item->id;
                    Cache::forever('IdItemOfGetMyMoney', $id);
                    return $item;
                }
            }
        }
        return  Items::where("id", $id)->first();
    }
}
