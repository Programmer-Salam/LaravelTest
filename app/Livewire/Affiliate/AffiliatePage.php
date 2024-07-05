<?php
namespace App\Livewire\Affiliate;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Affiliate\Affiliate;
use Illuminate\Support\Facades\Log;
use App\Models\Affiliate\AffiliateNetworkType;
use Illuminate\Validation\ValidationException;
use Livewire\WithPagination;

class AffiliatePage extends Component
{
    use WithPagination;

    public $perpage = 5;
    public $validationErrors = [];

    public $players  = '';
    public $commission_type = 'revenue';
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
    'network_link' => 'required',
    'affiliate_note' => 'nullable|string|min:10', 
];

public function submit()
{
    $this->validate();

    try {

        $randomNumber = rand(100000, 999999); 

        $network_id = $this->network_type;
        $affiliate_network = AffiliateNetworkType::findOrFail($network_id);

        $player_id = $this->players;
        $player_info = User::findOrFail($player_id);

        $network_link = $this->network_link;
        $existing_affiliate_network = Affiliate::where('network_link', $network_link)
        ->where('players', $player_id)
        ->first();

        if ($existing_affiliate_network) {
            $this->addError('network_link', 'This network link already exists.');
            return;
        }

        Affiliate::create([
            'players' => $this->players,
            'company_id' => $player_info->company_id,
            'user_id' => $player_info->user_id,
            'commission_type' => $this->commission_type,
            'commission_rate' => $this->commission_rate,
            'currency' => $this->currency,
            'network_type' => $affiliate_network->network,
            'network_link' => $this->network_link,
            'note' => $this->affiliate_note,
            'affiliate_link' => $affiliate_network->network_domain . "/affiliate?btag=" . $randomNumber,
        ]);
        $this->reset();
        $this->handleCloseModal();
        $this->dispatch('swal', title: 'Created', icon: 'success', text: 'Affiliate created successfully');
   
    } catch (ValidationException $e) {
        return;
    } catch (\Exception $e) {
        // Log::error('Affiliate creation failed', [
        //     'error' => $e->getMessage(),
        //     'trace' => $e->getTraceAsString(),
        // ]);
        $this->dispatch('swal', title: 'Error', icon: 'error', text: 'Affiliate Creation Unsuccessful. An unexpected error occurred.');
    }
}

public function handleCloseModal()
    {
        $this->dispatch('close-modal');
    }

public function render()
    {
        return view('livewire.affiliate.affiliate-page', [
            // = Affiliate::with('player')->paginate($this->perpage);
            'Affiliates' => Affiliate::with('player')->paginate($this->perpage),
            'Users' => User::latest()->get(),
            'AffiliateNetworkTypes' => AffiliateNetworkType::latest()->get()
        ]);
    }
}
