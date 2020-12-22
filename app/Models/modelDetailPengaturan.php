<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelDetailPengaturan extends Model
{
    protected $table = 'tbdetailpengaturan';
    protected $primaryKey = 'iddetailatur';
  	public $timestamps = false;
  	public $incrementing = false;
}
