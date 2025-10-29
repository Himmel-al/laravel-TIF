<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $primaryKey = 'customer_id';
    protected $table      = 'customer';

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
}
