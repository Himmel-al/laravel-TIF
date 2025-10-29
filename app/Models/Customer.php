<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'customer';

    // Kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'address_line',
        'city',
        'state',
        'postal_code',
        'country',
        'membership_type',
        'registration_date',
        'last_purchase_date',
        'total_spent',
        'preferred_contact_method',
    ];

    // Kolom yang dianggap sebagai tanggal
    protected $dates = [
        'registration_date',
        'last_purchase_date',
    ];

    // (Opsional) Casting tipe data
    protected $casts = [
        'total_spent' => 'decimal:2',
    ];
    public function scopeMembershipType($query, $type)
    {
        return $query->where('membership_type', $type);
    }

    /**
     * Scope untuk mencari berdasarkan kota.
     */
    public function scopeCity($query, $city)
    {
        return $query->where('city', 'like', "%$city%");
    }
}
