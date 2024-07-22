<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fulfilment extends Model
{
    use SoftDeletes;
    protected $table = 'fulfilments';
    protected $guarded = [];
}