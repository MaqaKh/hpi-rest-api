<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EconomicData extends Model
{
    protected $table = 'economic_data';
    protected $fillable = ['date', 'value', 'infoType'];
    public $timestamps = false;

    // Additional model logic or relationships can be added here
}
