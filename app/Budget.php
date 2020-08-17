<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected  $fillable = ['project_id', 'total'];
}
