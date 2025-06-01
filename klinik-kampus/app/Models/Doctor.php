<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'specialization',
        'phone',  // Added phone field
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'email' => 'N/A',
            'name' => 'User tidak ditemukan'
        ]);
    }

    /**
     * Scope untuk mencari dokter berdasarkan spesialisasi
     */
    public function scopeSpecialization($query, $specialization)
    {
        return $query->where('specialization', 'like', '%'.$specialization.'%');
    }

    /**
     * Scope untuk mencari dokter berdasarkan nama
     */
    public function scopeByName($query, $name)
    {
        return $query->where('name', 'like', '%'.$name.'%');
    }

    /**
     * Format nomor telepon untuk tampilan
     */
    public function getFormattedPhoneAttribute()
    {
        if (empty($this->phone)) {
            return '-';
        }
        
        // Format: 0812-3456-7890
        return preg_replace('/(\d{4})(\d{4})(\d{4})/', '$1-$2-$3', $this->phone);
    }
}