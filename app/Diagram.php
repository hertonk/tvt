<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagram extends Model
{
    protected $fillable = ['name', 'type', 'description', 'file'];
}
