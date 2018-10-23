<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['student_id','item_id' ,'assessment'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
