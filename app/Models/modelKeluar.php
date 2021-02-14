<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelKeluar extends Model
{
    protected $table = 'tbkeluar';
    protected $primaryKey = 'idkeluar';
  	public $timestamps = false;
}
