<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    use HasFactory;

    protected $table = 'memberslist';

    protected $fillable = [
        'photo',
        'first_name',        
        'last_name',
        'age',
        'email',
        'address',           
        'mobile',        
        'date_of_birth',
        'gender',   
        'fee',
        'status'
    ];
}
