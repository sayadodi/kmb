<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelDetailKeluar extends Model
{
    protected $table = 'tbdetailkeluar';
    protected $primaryKey = 'iddetailkeluar';
  	public $timestamps = false;
}
