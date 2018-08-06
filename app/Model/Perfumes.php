<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Perfumes extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'description',
        'detail',
        'original_price',
        'promotion_price',
        'dore',
        'concentration',
        'date_created',
        'groupofincense',
        'style',
        'bartender',
        'status',
        'count',
        'typeofProduct',
        'gender',
        'country',
        'path_image',
        'date_expiration'
    ];

    public function getAllPerfumes() {
        return DB::table('perfumes')->get();
    }
}
