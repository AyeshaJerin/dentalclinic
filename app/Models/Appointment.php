<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
   protected $fillable=['patient_id','doctor_id','service_id','schedule_id','appointment_date','serial_number','status'];
    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
    public function patient(){
        return $this->belongsTo(Patient::class);
    }
    public function schedule(){
        return $this->belongsTo(DoctorSchedule::class,'schedule_id');
    }
}
