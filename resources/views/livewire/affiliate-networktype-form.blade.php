<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Create Network Type</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
            <form wire:submit.prevent="networktype">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="form-label">Network name</label>
                            <input
                                    type="text"
                                  wire:model="network_type"
                                    class="form-control"
                                    autocomplete="off"
                                /> 
                            @error('network_type') <span class="text-danger">{{ $message }}</span> @enderror
         
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="form-label">Domain Type</label>
                            <input
                                    type="text"
                                  wire:model="domain_type"
                                    class="form-control"
                                    autocomplete="off"
                                />
                            @error('domain_type') <span class="text-danger">{{ $message }}</span> @enderror

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="form-label">Domain Link</label>
                            <input
                                    type="text"
                                  wire:model="domain_link"
                                    class="form-control"
                placeholder="http://name.com/"
                                    autocomplete="off"
                                />
                            @error('domain_link') <span class="text-danger">{{ $message }}</span> @enderror

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
                    Create Network
                </button>
            </div>
            </form>
        </div>
    </div>
</div>

  
