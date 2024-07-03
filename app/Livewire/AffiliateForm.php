<?php
namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Affiliate;
use App\Models\AffiliateNetworkType;
use Illuminate\Validation\ValidationException;

class AffiliateForm extends Component
{   
    public $players;
    public $commission_type;
    public $commission_rate;
    public $currency;
    public $network_type;
    public $network_link;
    public $affiliate_note;
    public $validationErrors = [];

    protected $rules = [
        'players' => 'required|string',
        'commission_type' => 'required|string',
        'commission_rate' => 'required|numeric|min:1|max:20',
        'currency' => 'required|string',
        'network_type' => 'required|string',
        'network_link' => 'required|url',
        'affiliate_note' => 'nullable|string|min:10',
    ];

    public function submit() 
    {
        try {
            $this->validate();

            Affiliate::create([
                'players' => $this->players,
                'commission_type' => $this->commission_type,
                'commission_rate' => $this->commission_rate,
                'currency' => $this->currency,
                'network_type' => $this->network_type,
                'network_link' => $this->network_link,
                'affiliate_note' => $this->affiliate_note,
            ]);

            session()->flash('success', 'Affiliate created successfully!!');
            $this->reset();
        } catch (ValidationException $e) {
            $this->validationErrors = $e->errors();
        }
    }

    public function render()
    {
        return view('livewire.affiliate-form', [
            'Affiliates' => Affiliate::latest()->get(),
            'Users' => User::latest()->get(),
            'AffiliateNetworkTypes' => AffiliateNetworkType::latest()->get()
        ]);
    }
}
