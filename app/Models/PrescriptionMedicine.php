<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionMedicine extends Model
{
    use HasFactory;
    protected $fillable=['prescription_id','medicine_name','dosage','frequency','duration','instructions'];
}
