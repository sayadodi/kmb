<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelHistoriTamu extends Model
{
    protected $table = 'tbhistoritamu';
    protected $primaryKey = 'idhistori';
  	public $timestamps = false;
}
