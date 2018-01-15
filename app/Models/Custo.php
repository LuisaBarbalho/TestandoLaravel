<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Custo extends Model
{
    protected $fillable = [
    	'description', 'date', 'value'
    ];
}
