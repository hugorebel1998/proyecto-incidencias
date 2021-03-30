<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Incident extends Model
{
    use SoftDeletes;

    
    protected $fillable = [
        'title', 'description', 'severity', 'id_category', 'id_level', 'id_client', 'id_support'
    ];
}
