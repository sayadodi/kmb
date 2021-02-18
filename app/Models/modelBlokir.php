<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelBlokir extends Model
{
    protected $table = 'tbblokiremail';
    protected $primaryKey = 'idblokir';
  	public $timestamps = false;
}
