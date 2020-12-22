<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelMasterVendor extends Model
{
    protected $table = 'tbvendor';
    protected $primaryKey = 'kdvendor';
  	public $timestamps = false;
  	public $incrementing = false;
}
