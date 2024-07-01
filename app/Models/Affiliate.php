<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    use HasFactory;

    protected $fillable = [
        'players', 
        'commission_type', 
        'commission_rate', 
        'currency', 
        'network_type', 
        'network_link', 
        'affiliate_note'
    ];
}
