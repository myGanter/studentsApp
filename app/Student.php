<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['group_id', 'name', 'surname', 'patronymic', 'date'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
