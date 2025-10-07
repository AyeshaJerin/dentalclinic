<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorSchedule extends Model
{
    use HasFactory;
     protected $fillable=['doctor_id','day_of_week','start_time','end_time'];
     public function doctor(){
        return $this->belongsTo(Doctor::class);
     }
    /**
     * Accessor: return day name when day_of_week stored as number.
     * Example: 0 => Sunday, 1 => Monday, ... 6 => Saturday
     */
    public function getDayOfWeekAttribute($value)
    {
       $days = [
          0 => 'Sunday',
          1 => 'Monday',
          2 => 'Tuesday',
          3 => 'Wednesday',
          4 => 'Thursday',
          5 => 'Friday',
          6 => 'Saturday',
       ];

       // if stored as numeric string or int, map to name
       if (is_numeric($value)) {
          $idx = intval($value);
          return $days[$idx] ?? $value;
       }

       // if it's already a name, normalize capitalization
       if (is_string($value)) {
          return ucfirst(strtolower($value));
       }

       return $value;
    }

    /**
     * Keep the raw numeric (or stored) value available as day_of_week_number
     */
    public function getDayOfWeekNumberAttribute()
    {
       return $this->attributes['day_of_week'] ?? null;
    }


}
