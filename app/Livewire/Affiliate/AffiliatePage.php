<?php
namespace App\Livewire\Affiliate;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Affiliate\Affiliate;
use Illuminate\Support\Facades\Log;
use App\Models\Affiliate\AffiliateNetworkType;
use Illuminate\Validation\ValidationException;

class AffiliatePage extends Component
{
    public $validationErrors = [];

    public $players  = '';
public $commission_type = '';
public $commission_rate = '';
public $currency = '';
public $network_type = '';
public $network_link = '';
public $affiliate_note = '';

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
    $this->validate();

    try {

        $selectedValue = $this->network_type;
        $partss = explode('|', $selectedValue);
        $network_name = $partss[0];
        $network_affiliate_link = $partss[1];

        $fullName = trim($this->players);
        $normalizedFullName = preg_replace('/\s+/', ' ', $fullName);
        $nameParts = explode(' ', $normalizedFullName);
        $part = $nameParts[0];

        $player_info = DB::table('users')->where('first_name', '=', $part)->first();
        $affiliate_network_links = AffiliateNetworkType::where('network_domain', '=', $network_affiliate_link)->first();

        Affiliate::create([
            'players' => $this->players,
            'company_id' => $player_info->company_id,
            'user_id' => $player_info->user_id,
            'commission_type' => $this->commission_type,
            'commission_rate' => $this->commission_rate,
            'currency' => $this->currency,
            'network_type' => $network_name,
            'network_link' => $this->network_link,
            'note' => $this->affiliate_note,
            'affiliate_link' => $affiliate_network_links->network_domain
        ]);

        $this->dispatch('swal', title: 'Created', icon: 'success', text: 'Affiliate Created Successfully');
        $this->reset();
    } catch (ValidationException $e) {
        $this->dispatch('swal', title: 'Error', icon: 'error', text: 'Affiliate Creation Unsuccessful.');
    } catch (\Exception $e) {
        Log::error('Affiliate Creation Error: ' . $e->getMessage(), [
            'exception' => $e,
            'trace' => $e->getTraceAsString()
        ]);
        $this->dispatch('swal', title: 'Error', icon: 'error', text: 'Affiliate Creation Unsuccessful. An unexpected error occurred.');
    }
}
    public function render()
    {
        return view('livewire.affiliate.affiliate-page', [
            'Affiliates' => Affiliate::latest()->get(),
            'Users' => User::latest()->get(),
            'AffiliateNetworkTypes' => AffiliateNetworkType::latest()->get()
        ]);
    }
}
