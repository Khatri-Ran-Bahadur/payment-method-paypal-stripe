<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Vendor extends Model
{
	protected $table='vendor';
	use SoftDeletes;
    protected $dates=['deleted_at'];
    use HasFactory;
}
