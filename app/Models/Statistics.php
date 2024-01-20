<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistics extends Model
{
    use HasFactory;

    protected $table = 'statistics';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'highest',
        'lowest',
        'average',
        'created_date',
        'room_num',
        'has_repair',
        'has_bill_of_sale',
        'childdistrictid',
        'mark_id',
        'region_id',
    ];

    protected $casts = [
        'has_repair' => 'boolean',
        'has_bill_of_sale' => 'boolean',
    ];
}
