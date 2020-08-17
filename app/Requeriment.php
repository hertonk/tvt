<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requeriment extends Model
{
    protected $fillable = ['name', 'project_id', 'code', 'type', 'description', 'date_init', 'date_end'];
}
