<?php

namespace App\Models\Affiliate;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    use HasFactory;

    protected $fillable = [
        'players', 
         'company_id',
         'user_id',
        'commission_type', 
        'commission_rate', 
        'currency', 
        'network_type', 
        'network_link', 
        'note',
        'affiliate_link'
    ];
}
