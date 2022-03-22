<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'problem_id',
        'case_1',
        'case_2',
        'case_3',
        'case_4',
        'case_5',
        'sol_1',
        'sol_2',
        'sol_3',
        'sol_4',
        'sol_5'
    ];

    public function problem()
    {
        $this->hasOne(Problem::class);
    }
}
