<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CImport extends Model
{
    use HasFactory;
    protected $table="imports";
    protected $fillable = ['contact_number','is_payable','agent_name','cpsa_name','agent_contact_number','status2','status','user_type','referee_id','import_date'];
}
