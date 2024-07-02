<form wire:submit.prevent="submit">  
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New affiliate user</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="form-label">Select Players</label>
                            {{-- @error('players') <span class="text-danger">{{ $message }}</span> @enderror --}}
                            <select wire:model="players" class="form-control"   >
                                <option value="" selected="">Choose</option>
                                @foreach ($Users as $User)
                 <option value="
                    {{ trim(implode(' ', [$User->first_name, $User->last_name, $User->middle_name])) }}
                 ">
                    {{ trim(implode(' ', [$User->first_name, $User->last_name, $User->middle_name])) }}
                </option>
                                @endforeach 
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-body">
                <label class="form-label">Commission type</label>
                <div class="form-selectgroup-boxes row mb-3">
                    <div class="col-lg-6">
                        <label class="form-selectgroup-item">
                            <input
                                type="radio"
                                name="commission_type"
                                wire:model="commission_type"
                                value="revenue" 
                                class="form-selectgroup-input"
                            />
                            @error('commission_type') <span class="text-danger">{{ $message }}</span> @enderror
                            <span class="form-selectgroup-label d-flex align-items-center p-3">
                                <span class="me-3">
                                    <span class="form-selectgroup-check"></span>
                                </span>
                                <span class="form-selectgroup-label-content">
                                    <span class="form-selectgroup-title strong mb-1">Revenue</span>
                                    <span class="d-block text-muted">Revenue generated by the platform from the payment processing section of your affiliated members</span>
                                </span>
                            </span>
                        </label>
                    </div>
                    <div class="col-lg-6">
                        <label class="form-selectgroup-item">
                            <input
                                type="radio"
                                name="commission_type"
                                wire:model="commission_type"
                                value="deposit"
                                class="form-selectgroup-input"
                            />
                            @error('commission_type') <span class="text-danger">{{ $message }}</span> @enderror
                            <span class="form-selectgroup-label d-flex align-items-center p-3">
                                <span class="me-3">
                                    <span class="form-selectgroup-check"></span>
                                </span>
                                <span class="form-selectgroup-label-content">
                                    <span class="form-selectgroup-title strong mb-1">Deposit</span>
                                    <span class="d-block text-muted">From the deposit made by your affiliate members. Merchant commissions will be deducted from the affiliate balance.</span>
                                </span>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Commission rate</label>
                            <div class="input-group input-group-flat">
                                <span class="input-group-text">%</span>
                                <input
                                    type="text"
                                  wire:model="commission_rate"
                                    class="form-control ps-0"
                                    value="15"
                                    autocomplete="off"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Currency</label>
                            <select wire:model="currency" class="form-select"   >
                                <option value=""  selected="">Choose</option>
                                <option value="USD">USD</option>
                                <option value="EUR">EUR</option>
                                <option value="STG">STG</option>
                                <option value="TRY">TRY</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            

            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Network</label>
                            <select wire:model="network_type" class="form-select">
                                <option value="" selected>Choose</option>
                                @forelse ($AffiliateNetworkTypes as $AffiliateNetworkType)
                                    <option value="{{ $AffiliateNetworkType->network }}">{{ $AffiliateNetworkType->network }}</option>
                                @empty
                                    <option value="" disabled selected>No Network</option>
                                @endforelse
                            </select>
                            
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Network Link</label>
                            <input
                                type="text"
                                wire:model="network_link"
                                class="form-control"
                                placeholder="www.instagram.com/network"
                            />
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div>
                            <label class="form-label">Note</label>
                            <textarea
                                wire:model="affiliate_note"
                                class="form-control"
                                rows="3"
                                placeholder="Note must have at least 10 characters"
                            ></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                
                <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</a>
                {{-- <div class="mb-3 row"> 
                    <span wire:loading class="col-md-3 offset-md-5 text-primary">Processing...</span>
                  </div> --}}
                <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-affiliate" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M5.931 6.936l1.275 4.249m5.607 5.609l4.251 1.275"></path>
                        <path d="M11.683 12.317l5.759 -5.759"></path>
                        <path d="M5.5 5.5m-1.5 0a1.5 1.5 0 1 0 3 0a1.5 1.5 0 1 0 -3 0"></path>
                        <path d="M18.5 5.5m-1.5 0a1.5 1.5 0 1 0 3 0a1.5 1.5 0 1 0 -3 0"></path>
                        <path d="M18.5 18.5m-1.5 0a1.5 1.5 0 1 0 3 0a1.5 1.5 0 1 0 -3 0"></path>
                        <path d="M8.5 15.5m-4.5 0a4.5 4.5 0 1 0 9 0a4.5 4.5 0 1 0 -9 0"></path>
                    </svg>
                    Create affiliate
                </button>
            </div>
        </div>
    </div>
   
</form>
