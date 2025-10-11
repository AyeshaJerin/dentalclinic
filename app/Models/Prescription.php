<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
     protected $fillable=['appointment_id','doctor_id','patient_id','diagnosis','advice','age','inv'];
    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
    public function patient(){
        return $this->belongsTo(Patient::class);
    }
    public function medicines(){
        return $this->hasMany(PrescriptionMedicine::class);
    }
}
