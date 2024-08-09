<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Integration extends Model
{
    use SoftDeletes;
    protected $table = 'integration';
    protected $fillable = ['title','image'];
    protected $guarded = [];
}
