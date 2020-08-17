<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = ['name', 'type', 'description', 'technologies', 'date_init', 'date_end', 'results', 'status'];
}
