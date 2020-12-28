<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelHistoriVendor extends Model
{
    protected $table = 'tbhistorivendor';
    protected $primaryKey = 'idhistoriv';
  	public $timestamps = false;
  	public $incrementing = false;
}
