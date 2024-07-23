<div>
    @livewire('partials.navbar')
    @livewire('partials.menubar')
    <div class="page-wrapper">
        <form wire:submit.prevent='placeOrder'>
            <div class="page-body">
                <section class="h-100">
                    <div class="container py-5">
                      <div class="row d-flex justify-content-center my-4">
                        <div class="col-md-8">
                          <div class="card mb-4">
                            <div class="card-header py-3">
                              <h3 class="mb-0">Address</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">First Name</label>
                                            <input type="text" id="first_name" wire:model.defer="first_name" class="form-control @error('first_name') is-invalid @enderror" >
                                            @error('first_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" id="last_name" wire:model.defer="last_name" class="form-control @error('last_name') is-invalid @enderror" >
                                            @error('last_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Phone Number</label>
                                            <input type="int" id="phone" wire:model.defer="phone" class="form-control @error('phone') is-invalid @enderror">
                                            @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Street Address</label>
                                            <input type="text" id="street_address" wire:model.defer="street_address" class="form-control @error('street_address') is-invalid @enderror">
                                            @error('street_address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">City</label>
                                            <input type="text" id="city" wire:model.defer="city" class="form-control  @error('city') is-invalid @enderror">
                                            @error('city')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">State</label>
                                            <input type="text" id="state" wire:model.defer="state" class="form-control  @error('state') is-invalid @enderror">
                                            @error('state')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Zip Code</label>
                                            <input type="text" id="zip_code" wire:model.defer="zip_code" class="form-control  @error('zip_code') is-invalid @enderror">
                                            @error('zip_code')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="form-label">Payment Method</label>
                                        <div class="form-selectgroup form-selectgroup-boxes d-flex flex-column">
                                            <label class="form-selectgroup-item flex-fill">
                                              <input wire:model='payment_method' type="radio" value="cash" class="form-selectgroup-input">
                                              <div class="form-selectgroup-label d-flex align-items-center p-3">
                                                <div class="me-3">
                                                  <span class="form-selectgroup-check"></span>
                                                </div>
                                                <div>
                                                  <span class=""></span>
                                                  Cash
                                                </div>
                                              </div>
                                            </label>
                                            <label class="form-selectgroup-item flex-fill">
                                              <input wire:model='payment_method' type="radio"  value="credit" class="form-selectgroup-input" checked="">
                                              <div class="form-selectgroup-label d-flex align-items-center p-3">
                                                <div class="me-3">
                                                  <span class="form-selectgroup-check"></span>
                                                </div>
                                                <div>
                                                  <span class=""></span>
                                                  Credit
                                                </div>
                                              </div>
                                            </label>
                                            @error('payment_method')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="card mb-4">
                            <div class="card-header py-3">
                              <h2 class="mb-0">Order Summary</h2>
                            </div>
                            <div class="card-body">
                              <ul class="list-group list-group-flush">
                                <li
                                  class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                  Subtotal
                                  <span>{{ Number::currency($grand_total, 'Rp.') }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                  Shipping
                                  <span>Rp.0</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    Taxes
                                    <span>Rp.0</span>
                                  </li>
                                <li
                                  class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                  <div>
                                    <strong>Total amount</strong>
                                  </div>
                                  <span><strong>{{ Number::currency($grand_total, 'Rp.') }}</strong></span>
                                </li>
                              </ul> 
                            </div>
                                <button type="submit" class="btn btn-primary btn-md">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 17h-11v-14h-2" /><path d="M6 5l14 1l-1 7h-13" /></svg>
                                    <span wire:loading.remove>Place Order</span>
                                    <span wire:loading>Processing....</span>
                                </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
            </div>
        </form>
      
    </div>
</div>
