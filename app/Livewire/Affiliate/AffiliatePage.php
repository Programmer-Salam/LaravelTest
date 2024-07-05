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
        $existing_affiliate_network = Affiliate::where('network_link', $network_link)->first(); // I think we have to validate that if the link is already used by the login user but we didn't have that for now

        if ($existing_affiliate_network) {
            $this->addError('network_link', 'This network link already exists.');
            // $this->addError('network_link', 'This network link already exists for you!');
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
        // $this->dispatch('close-modal');
        $this->handleCloseModal();
        $this->dispatch('swal', title: 'Created', icon: 'success', text: 'Affiliate created successfully');
        // $this->handleCloseModal();
    } catch (ValidationException $e) {
        return;
    } catch (\Exception $e) {
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
            'Affiliates' => Affiliate::paginate(5),
            'Users' => User::latest()->get(),
            'AffiliateNetworkTypes' => AffiliateNetworkType::latest()->get()
        ]);
    }
}
