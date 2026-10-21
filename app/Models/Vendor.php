<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $table = 'vendors';

    protected $fillable = [
        'code',
        'name',
        'office_address',
        'email',
        'phone',
        'tax_id',
        'business_license_number',
        'status',
        'pic_name',
        'pic_position',
        'pic_email',
        'pic_phone',
    ];
}
