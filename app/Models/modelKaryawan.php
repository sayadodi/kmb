<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelKaryawan extends Model
{
    protected $table = 'tbkaryawan';
    protected $primaryKey = 'idKaryawan';
  	public $timestamps = false;
  	public $incrementing = false;
}
