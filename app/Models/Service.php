<?php

namespace App\Models;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = [
        'service_type',
        'image',
        'status',
        'description',
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

}
