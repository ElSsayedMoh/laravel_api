<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'about_us',
        'why_us',
        'goal',
        'vision',
        'about_footer',
        'ads_text'
    ];
}
