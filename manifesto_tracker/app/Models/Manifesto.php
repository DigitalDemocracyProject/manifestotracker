<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manifesto extends Model
{
    //
    protected $table = 'manifesto_tracker';
    protected $primaryKey = 'Policy_Progress';
    public $incrementing = false;
    protected $keyType = 'string';
}
