<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Core\HelperFunction;

class Paper extends Model
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

    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function uploaded()
    {
        return $this->hasOne(User::class,'id','uploaded_by');
    }

    public function trg()
    {
        return $this->hasOne(User::class,'id','approved_by_trg');
    }

    public function senior()
    {
        return $this->hasOne(User::class,'id','approved_by_senior_intructor');
    }

    public function chief()
    {
        return $this->hasOne(User::class,'id','approved_by_chief_instructor');
    }

    public function file()
    {
        return $this->hasMany(PaperFile::class,'paper_id','id');
    }
}
