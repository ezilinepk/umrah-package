<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function paper()
    {
        return $this->hasOne(Paper::class, 'id','paper_id');
    }

    public function action()
    {
        return $this->hasOne(User::class,'id','changed_by');
    }
}
