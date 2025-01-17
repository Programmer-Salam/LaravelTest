<?php

namespace App\Livewire\Affiliate;

use Log;
use Livewire\Component;
use App\Models\Affiliate\AffiliateComission;
use App\Models\Affiliate\AffiliateNetworkType;
use Illuminate\Validation\ValidationException;

class AffiliateGroupPage extends Component
{
    public $validationErrors = [];
    public $validationErrorNetwork = [];

    public $type_name = '';
    public $minimum_rate = '';
    public $maximum_rate = '';
    public $description = '';
    public $deposit_rule = '';
    public $deposit_included_methods = [];
    public $withdraw_rule = '';
    public $withdraw_included_methods = [];
    public $deduction_rule = '';
    public $deduction_included_methods = [];

    public $network_type = '';
    public $domain_type = ''; 
    public $domain_link = '';

    protected $rulesCommission = [
        'type_name' => 'required|string',
        'minimum_rate' => 'required|numeric|min:1|max:20',
        'maximum_rate' => 'required|numeric|min:1|max:20',
        'description' => 'required|string|min:10',
        'deposit_rule' => 'required|string',
        'deposit_included_methods' => 'required|array', 
        'withdraw_rule' => 'required|string',
        'withdraw_included_methods' => 'required|array',
        'deduction_rule' => 'required|string',
        'deduction_included_methods' => 'required|array',
    ];

    protected $rulesNetwork = [
        'network_type' => 'required|string',
        'domain_type' => 'required|string',
        'domain_link' => 'required',
    ];

    public function createCommissionType()
    { 
        $this->validate($this->rulesCommission);  

        try {
            AffiliateComission::create([
                'type_name' => $this->type_name,
                'minimum_rate' => $this->minimum_rate,
                'maximum_rate' => $this->maximum_rate,
                'description' => $this->description,
                'deposit_rule' => $this->deposit_rule,
                'deposit_included_methods' => $this->deposit_included_methods, 
                'withdraw_rule' => $this->withdraw_rule,
                'withdraw_included_methods' => $this->withdraw_included_methods, 
                'deduction_rule' => $this->deduction_rule,
                'deduction_included_methods' => $this->deduction_included_methods, 
            ]);
            $this->dispatch('swal', title: 'Created', icon: 'success', text: 'Commission type created successfully.');

        $this->handleCloseModal();
            $this->reset([
                'type_name', 'minimum_rate', 'maximum_rate', 'description', 
                'deposit_rule', 'deposit_included_methods', 'withdraw_rule', 
                'withdraw_included_methods', 'deduction_rule', 'deduction_included_methods'
            ]);
        } catch (ValidationException $e) {
          return;
        } catch (\Exception $e) {
            $this->dispatch('swal', title: 'Error', icon: 'danger', text: 'Commission creation unsuccessful. An unexpected error occurred: ' . $e->getMessage());
        }
    }

    public function handleCloseModal()
    {
        $this->dispatch('close-modal');
    }

    public function networktype()
    {
        $this->validate($this->rulesNetwork);

        try {
            AffiliateNetworkType::create([
                'network' => $this->network_type,
                'network_domain_type' => $this->domain_type,
                'network_domain' => $this->domain_link,
            ]);
            $this->dispatch('swal', title: 'Created', icon: 'success', text: 'Network created successfully.');
            // $this->dispatch('close-modal2');
        $this->handleCloseModal2();
            $this->reset(['network_type', 'domain_type', 'domain_link']);
        } catch (ValidationException $e) {
            return;
        } catch (\Exception $e) {
            $this->dispatch('swal', title: 'Error', icon: 'danger', text: 'Network creation unsuccessful. An unexpected error occurred: ' . $e->getMessage());
        }
    }

    
    public function handleCloseModal2()
    {
        $this->dispatch('close-modal2');
    }
    public function render()
    {
        return view('livewire.affiliate.affiliate-group-page', [
            'AffiliateComissions' => AffiliateComission::latest()->get(), 
            'AffiliateNetworks' => AffiliateNetworkType::latest()->get(),
        ]);
    }
}
