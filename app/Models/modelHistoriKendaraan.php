<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelHistoriKendaraan extends Model
{
    protected $table = 'tbhistorikendaraan';
    protected $primaryKey = 'idhistorikend';
  	public $timestamps = false;
}
