<div>
    @livewire('partials.navbar')
    @livewire('partials.menubar')
    <div class="page-wrapper">
        <div class="page-body">
            <section class="h-100">
                <div class="container py-5">
                  <div class="row d-flex justify-content-center my-4">
                    <div class="col-md-8">
                      <div class="card mb-4">
                        <div class="card-header py-3">
                          <h3 class="mb-0">Shopping Cart</h3>
                        </div>
                        <div class="card-body">
                        @forelse ($cart_items as $item)
                          <div class="row" wire:key='{{ $item['product_id'] }}'>
                            <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                              <!-- Image -->
                              <div class="bg-image hover-overlay hover-zoom ripple rounded">
                                <img src="{{ url('storage',$item['image']) }}"
                                  class="w-100" alt="{{ $item['name'] }}" />
                              </div>
                              <!-- Image -->
                            </div>
              
                            <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                              <!-- Data -->
                              <h2><strong>{{ $item['name'] }}</strong></h2>
                              <h3>{{ Number::currency($item['unit_amount'], 'IDR') }}</h3>
                              <button wire:click='removeItem({{ $item['product_id'] }})' type="button" class="btn btn-danger btn-md mb-2">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                Remove
                              </button>
                              <!-- Data -->
                            </div>
              
                            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0" wire:key='{{ $item['product_id'] }}'>
                              <!-- Quantity -->
                              <div class="d-flex mb-4" style="max-width: 300px">
                                <div class="input-group">
                                    <button wire:click='decreaseQty({{ $item['product_id'] }})' class="btn btn-white border border-secondary px-3" type="button">
                                        <span class="m-auto text-2xl font-thin">-</span>
                                    </button>
                                    <input class="form-control text-center border border-secondary" type="number" placeholder="{{ $item['quantity'] }}" readonly>
                                    <button wire:click='increaseQty({{ $item['product_id'] }})' class="btn btn-white border border-secondary px-3" type="button">
                                        <span class="m-auto text-2xl font-thin">+</span>
                                    </button>
                                </div>
                              </div>
                              <!-- Quantity -->
              
                              <!-- Price -->
                              <p class="text-start text-md-center">
                                <strong>{{ Number::currency($item['total_amount'], 'Rp.') }}</strong>
                              </p>
                              <!-- Price -->
                            </div>
                          </div>
                          <hr class="my-4" />
                        @empty
                        <h2>No items avaliable in cart!</h2>   
                        @endforelse
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card mb-4">
                        <div class="card-header py-3">
                          <h2 class="mb-0">Summary</h2>
                        </div>
                        <div class="card-body">
                          <ul class="list-group list-group-flush">
                            <li
                              class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                              Products
                              <span>{{ Number::currency($grand_total, 'Rp.') }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                              Shipping
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
                            @if($cart_items)
                                <a href="/checkout" type="button" class="btn btn-primary btn-md">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 17h-11v-14h-2" /><path d="M6 5l14 1l-1 7h-13" /></svg>
                                    Go to checkout
                                </a>
                            @endif
                      </div>
                    </div>
                  </div>
                </div>
              </section>
        </div>
    </div>
</div>
