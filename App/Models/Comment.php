<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Dit is een klasse voor het uitvouwen van een model
 */
class Comment extends Model
{
    public $fillable = ['author', 'contents'];
}
