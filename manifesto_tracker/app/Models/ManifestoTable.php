<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManifestoTable extends Model
{
    //
    protected $table = 'manifesto';
    protected $primaryKey = 'Policy_Number';
    public $incrementing = false;
    protected $keyType = 'string';
}
