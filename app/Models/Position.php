<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $fillable = ['position_name', 'reports_to'];

    public function head()
    {
        return $this->belongsTo(Position::class, 'reports_to');
    }

    public function subordinates()
    {
        return $this->hasMany(Position::class, 'reports_to');
    }
}

