<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CImport extends Model
{
    use HasFactory;
    protected $table="imports";
    protected $fillable = ['contact_number','is_available'];
}
