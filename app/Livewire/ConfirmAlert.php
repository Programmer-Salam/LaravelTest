<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class ConfirmAlert extends Component
{

    public function createDocument()

 {



 $player = User::where('id', 1)->first();

if ($player) {

    Log::info('dd');
    $this->dispatch('swal', title: 'Document created', icon: 'success', text: 'Document created successfully');
 return;

 }
    // public function render()
    // {
    //     return view('livewire.confirm-alert');
    // }
}
}