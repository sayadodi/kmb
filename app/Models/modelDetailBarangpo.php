<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelDetailBarangpo extends Model
{
    protected $table = 'tbdetailpengiriman';
    protected $primaryKey = 'iddetailkirim';
  	public $timestamps = false;
}
