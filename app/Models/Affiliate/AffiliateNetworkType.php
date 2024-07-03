<?php

namespace App\Models\Affiliate;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliateNetworkType extends Model
{
    use HasFactory;

    protected $fillable = [
        'network',
        'network_domain_type',
        'network_domain',
    ];

}
  