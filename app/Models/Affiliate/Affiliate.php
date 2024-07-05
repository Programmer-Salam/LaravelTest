<?php

namespace App\Models\Affiliate;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    public function player()
    {
        return $this->belongsTo(User::class, 'players');
    }
}
