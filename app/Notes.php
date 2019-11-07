<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    protected $table = 'notes';

    protected $fillable = [ 'title', 'description', 'status' ];

    public $timestamps = true;

    protected $casts = [
        'title'             => 'string',
        'description'       => 'text',
        'status'            => 'string'
    ];
}
