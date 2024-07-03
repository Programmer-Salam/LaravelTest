<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Create New Commission Type</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
            <form wire:submit.prevent="createCommissionType">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label">Commission Name</label>
                            <input type="text" class="form-control" wire:model="type_name" autocomplete="off" />
                            @error('type_name') <span class="text-danger">{{ $message }}</span> @enderror 
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label">Minimum rate</label>
                            <div class="input-group input-group-flat">
                                <span class="input-group-text"> % </span>
                                <input type="text" class="form-control ps-0" wire:model="minimum_rate" autocomplete="off" placeholder="1 - 20" />
                            </div>
                            @error('minimum_rate') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label">Maximum rate</label>
                            <div class="input-group input-group-flat">
                                <span class="input-group-text"> % </span>
                                <input type="text" class="form-control ps-0" wire:model="maximum_rate" autocomplete="off" placeholder="1 - 20" />
                            </div>
                            @error('maximum_rate') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div>
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="3" wire:model="description" placeholder="Description must have at least 10 characters"></textarea>
                            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label">Deposit rule</label>
                            <select class="form-select" wire:model="deposit_rule">
                                <option value="" selected>Choose</option>
                                <option value="1">Include</option>
                                <option value="2">Exclude</option>
                            </select>
                            @error('deposit_rule') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="mb-3">
                            <label class="form-label">Included methods</label>
                            <select class="form-select" multiple wire:model="deposit_included_methods">
                                <option value="Bank Transfer">Bank Transfer</option>
                                <option value="Credit Card">Credit Card</option>
                                <option value="Paypal">Paypal</option>
                                <option value="Skrill">Skrill</option>
                            </select>
                            @error('deposit_included_methods') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label">Withdraw rule</label>
                            <select class="form-select" wire:model="withdraw_rule">
                                <option value="" selected>Choose</option>
                                <option value="1">Include</option>
                                <option value="2">Exclude</option>
                            </select>
                            @error('withdraw_rule') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="mb-3">
                            <label class="form-label">Included methods</label>
                            <select class="form-select" multiple wire:model="withdraw_included_methods">
                                <option value="Bank Transfer">Bank Transfer</option>
                                <option value="Credit Card">Credit Card</option>
                                <option value="Paypal">Paypal</option>
                                <option value="Skrill">Skrill</option>
                            </select>
                            @error('withdraw_included_methods') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label">Deduction rule</label>
                            <select class="form-select" wire:model="deduction_rule">
                                <option value="" selected>Choose</option>
                                <option value="1">Include</option>
                                <option value="2">Exclude</option>
                            </select>
                            @error('deduction_rule') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="mb-3">
                            <label class="form-label">Included methods</label>
                            <select class="form-select" multiple wire:model="deduction_included_methods">
                                <option value="Deposit merchant commission">Deposit merchant commission</option>
                                <option value="Withdrawal merchant commission">Withdrawal merchant commission</option>
                                <option value="Casino provider commission">Casino provider commission</option>
                                <option value="Slot provider commission">Slot provider commission</option>
                                <option value="Sport provider commission">Sport provider commission</option>
                            </select>
                            @error('deduction_included_methods') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</a>
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
                        Create type
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
