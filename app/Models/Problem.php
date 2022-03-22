<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    use HasFactory;
    protected $fillable = [
        'problem',
        'description',
        'type',
        'solvers',
        'example'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function test()
    {
        $this->belongsTo(Test::class);
    }
}
