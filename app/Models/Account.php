<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Account;

class Account extends Model
{
    use HasFactory;

    protected $table = 'accounts';

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function charges()
{
    return $this->hasMany(Charge::class);
}
}
