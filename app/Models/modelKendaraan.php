<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelKendaraan extends Model
{
    protected $table = 'tbkendaraan';
    protected $primaryKey = 'idkendaraan';
  	public $timestamps = false;
}
