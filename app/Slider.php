<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Slider extends Model
{   
    protected $table = "slider";
    protected $fillable = [
        
        'heading', 'title', 'subtitle' ,'description', 'button_text','primary_image' ,'background_image'
    ];
}
