<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class faq extends Model
{
    use SoftDeletes;
    protected $table = 'faq';
    protected $guarded = [];
}
