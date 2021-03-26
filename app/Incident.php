<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    protected $fillable = [
        'title', 'description', 'severity', 'id_category', 'id_level', 'id_client', 'id_support'
    ];
}
