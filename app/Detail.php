<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detail extends Model
{
    use SoftDeletes;
    protected $table = 'details_section';
    protected $fillable = [
        'busines','experience','shipments',
    ];
    protected $guarded = [];
}
