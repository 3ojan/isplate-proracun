<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VodicPodaci extends Model
{
    use HasFactory;
    protected $table = 'proracun_vodic_podaci';

    protected $casts = [
        'iznos' => 'float',
    ];
}
