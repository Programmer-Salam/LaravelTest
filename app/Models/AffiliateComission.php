<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliateComission extends Model
{
    use HasFactory;
    protected $fillable = [
        'type_name',
        'minimum_rate',
        'maximum_rate',
        'description',
        'deposit_rule',
        'deposit_included_methods',
        'withdraw_rule',
        'withdraw_included_methods',
        'deduction_rule',
        'deduction_included_methods',
    ];

    protected $casts = [
        'minimum_rate' => 'integer',
        'maximum_rate' => 'integer',
        // You might need to cast methods to arrays if you store them as JSON
        'deposit_included_methods' => 'array',
        'withdraw_included_methods' => 'array',
        'deduction_included_methods' => 'array',
    ];
}
