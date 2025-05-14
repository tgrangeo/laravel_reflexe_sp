<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RevisionSheet extends Model
{
    protected $table = 'revision_sheets';

    protected $fillable = [
        'id',
        'icon',
        'title',
        'course',
        'category',
        'author',
        'content',
    ];
}
