<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelJabatan extends Model
{
    protected $table = 'tbjabatan';
    protected $primaryKey = 'idJabatan';
  	public $timestamps = false;
  	public $incrementing = false;
}
