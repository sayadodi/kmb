<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelTamu extends Model
{
    protected $table = 'tbtamu';
    protected $primaryKey = 'kodetamu';
  	public $timestamps = false;
}
