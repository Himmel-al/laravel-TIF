<?php
<<<<<<< HEAD
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
=======

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
>>>>>>> 238b24ce61e8d47862b7095f8fb5472fe91d1f97

class Customer extends Model
{
    use HasFactory;

<<<<<<< HEAD
    // Nama tabel
    protected $table = 'customer';

    // Kolom yang bisa diisi (mass assignable)
=======
    protected $primaryKey = 'customer_id';
    protected $table      = 'customer';

>>>>>>> 238b24ce61e8d47862b7095f8fb5472fe91d1f97
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
<<<<<<< HEAD

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
=======
>>>>>>> 238b24ce61e8d47862b7095f8fb5472fe91d1f97
}
