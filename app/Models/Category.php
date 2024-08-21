<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Core\HelperFunction;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     *  Boot Function
     */

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {

            $model->{'uid'} = HelperFunction::_uid();

        });
    }
}
