<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = ['item1_id', 'type1', 'item2_id', 'type2'];
}
