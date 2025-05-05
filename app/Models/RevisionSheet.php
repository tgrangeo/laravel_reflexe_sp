<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RevisionSheet extends Model
{
    protected $table = 'revision_sheets';

    protected $fillable = [
        'type',
        'categorie',
        'titre',
        'chapitre',
        'contenuHtml',
        'tags',
        'criticite',
        'frequenceUtilisation',
        'favorite',
    ];

    protected $casts = [
        'tags' => 'array',
        'favorite' => 'boolean',
    ];
}
