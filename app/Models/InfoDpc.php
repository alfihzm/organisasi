<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoDpc extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'info_dpc';
    public $timestamps = false;
}
