<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baker extends Model
{
    use HasFactory;

    /**
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = ['name', 'last name',];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

}
