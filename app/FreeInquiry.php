<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FreeInquiry extends Model
{
    use SoftDeletes;
    protected $table = 'freeinquiries';
    protected $guarded = [];
}
