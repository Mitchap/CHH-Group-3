<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAnnouncement extends Model
{
    use HasFactory;
    protected $table = 'order_announcement';
    protected $fillable = ['file'];
}
