<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VodicAktivnost extends Model
{
    use HasFactory;
    protected $table = 'proracun_vodic_istaknuta_aktivnost';

    protected $casts = [
        'iznos' => 'float',
    ];
}
