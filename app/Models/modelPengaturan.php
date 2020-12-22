<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelPengaturan extends Model
{
    protected $table = 'tbpengaturan';
    protected $primaryKey = 'kodeatur';
  	public $timestamps = false;
}
