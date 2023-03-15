<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orcid extends Model
{
    use HasFactory;

    protected $fillable = [
        'orcid',
        'name',
        'surname',
        'keywords',
        'primary_email'
    ];
}
