<div>
    @livewire('partials.navbar')
    @livewire('partials.menubar')
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                            Overview
                        </div>
                        <h2 class="page-title">
                            Home
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="d-flex">
                          <div class="me-3">
                            <div class="input-icon">
                              <input wire:model.live.debounce.300ms='search' type="text" class="form-control" placeholder="Search…">
                              <span class="input-icon-addon">
                                <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path><path d="M21 21l-6 -6"></path></svg>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <!-- Page body -->
            <div class="page-body">
              <div class="container-xl">
                <div class="row g-4">
                  <div class="col-3">
                    <form action="./" method="get" autocomplete="off" novalidate>
                      <div class="subheader mb-2">Category</div>
                        @foreach($categories as $category)
                        <div class="mb-3" wire:key="{{ $category->id }}">
                            <label for="{{ $category->slug }}" class="form-check">
                            <input type="checkbox" wire:model.live="selected_categories" id="{{ $category->slug }}" value="{{ $category->id }}" class="form-check-input" name="form-stars">
                            <span class="form-check-label">{{ $category->name }}</span>
                            </label>
                        </div>
                        @endforeach
                      
                      <div class="subheader mb-2">Price</div>
                      <div class="row g-2 align-items-center mb-3">
                        <div class="font-semibold">{{ Number::currency($price_range, 'Rp.') }}</div>
                        <input type="range" wire:model.live="price_range" class="w-full h-1 bg-blue-100 rounded appearance-none cursor-pointer" max="1000000" value="100000" step="100000">
                        <div class="col">
                            <span class="text-lg font-bold">Rp.1,000</span>
                        </div>
                        <div class="col float-end">
                            <span class="text-lg font-bold">Rp.1,000,000</span>
                        </div>
                      </div>
                      <div class="subheader mb-2">Sort</div>
                      <div>
                        <select wire:model.live="sort" name="" class="form-select">
                            <option value="latest">Sort by latest</option>
                            <option value="price">Sort by Price</option>
                        </select>
                      </div>
                    </form>
                  </div>
                  <div class="col-9">
                    <div class="row row-cards">
                    @foreach($products as $product)
                      <div class="col-sm-6 col-lg-4">
                        <div class="card card-sm">
                          <a href="/products/{{ $product->slug }}" class="d-block"><img src="{{ url('storage', $product->images[0]) }}" class="card-img-top"></a>
                          <div class="card-body">
                            <div class="d-flex align-items-center justify-between gap-2 mb-3">
                                <div>
                                    <div class="text-md font-medium">{{ $product->name }}</div>
                                    <div class="text-lg">{{ Number::currency($product->price, 'Rp.') }}</div>
                                </div>
                            </div>
                            <a wire:click.prevent='addToCart({{ $product->id }})' href="#" class="btn btn-primary d-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                    <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                    <path d="M17 17h-11v-14h-2" />
                                    <path d="M6 5l14 1l-1 7h-13" />
                                </svg>
                                  <span wire:loading.remove wire:target="addToCart({{ $product->id }})">Add To cart</span><span wire:loading wire:target="addToCart({{ $product->id }})">Adding...</span></a>
                          </div>
                        </div>
                      </div>
                    @endforeach
                    </div>
                    <!-- pagination start -->
                    <div class="flex justify-end mt-6">
                        {{ $products->links() }}
                    </div>
                    <!-- pagination end -->
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
