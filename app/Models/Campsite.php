<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campsite extends Model
{
    public $fillable = [
        'assetId',
        'name',
        'status',
        'region',
        'x',
        'y'
    ];

}