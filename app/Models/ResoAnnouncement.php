<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResoAnnouncement extends Model
{
    use HasFactory;
    protected $table = 'reso_announcements';
    protected $fillable = ['file'];
}
