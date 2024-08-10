<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Service extends Model
{
    use SoftDeletes;
    protected $table = 'services';
    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        static::creating(function($service) {
            $count = 0;
            do {
                $service->slug = Str::slug($service->title, '-').(($count > 0)? '-'.$count: '');
                $duplicated = Self::whereSlug($service->slug)->first();
                $count++;
            } while($duplicated != null);
        });
    }
}
