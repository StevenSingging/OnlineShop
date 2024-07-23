<div>
    @livewire('partials.navbar')
    @livewire('partials.menubar')
    <div class="page-wrapper">
        <div class="page-body">
            <section class="py-5">
                <div class="container">
                    <div class="row gx-5">
                    <aside class="col-lg-6">
                        <div class="border rounded-4 mb-3 d-flex justify-content-center">
                        <a data-fslightbox="mygalley" class="rounded-4" data-type="image" href="#">
                            <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="{{ url('storage', $product->images[0]) }}" />
                        </a>
                        </div>
                        <div class="d-flex justify-content-center mb-3">
                            @foreach ($product->images as $image )
                                <a data-fslightbox="mygalley" class="border mx-1 rounded-2" data-type="image" href="" class="item-thumb">
                                    <img width="60" height="60" class="rounded-2" src="{{url('storage', $image)}}" alt="{{ $product->name }}" />
                                </a>
                            @endforeach       
                        </div>
                    </aside>
                    <main class="col-lg-6">
                        <div class="ps-lg-3">
                        <h1 class="title text-dark">
                            {{ $product->name }}
                        </h1>
                        <div class="mb-3">
                            <span class="h5">{{ Number::currency($product->price, 'Rp.') }}</span>
                            <span class="text-muted">/per pcs</span>
                        </div>

                        <p>
                            {!! Str::markdown($product->description) !!}
                        </p>

                        <hr />

                        <div class="row mb-4">
                            <!-- col.// -->
                            <div class="col-md-4 col-6 ">
                            <label class="mb-2 d-block">Quantity</label>
                                <div class="input-group mb-3" style="width: 170px;">
                                    <button wire:click='decreaseQty' class="btn btn-white border border-secondary px-3" type="button" data-mdb-ripple-color="dark">
                                        <span class="m-auto text-2xl font-thin">-</span>
                                    </button>
                                    <input type="number" wire:model='quantity' class="form-control text-center border border-secondary" readonly />
                                    <button wire:click='increaseQty' class="btn btn-white border border-secondary px-3" type="button" data-mdb-ripple-color="dark">
                                        <span class="m-auto text-2xl font-thin">+</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                            <button wire:click='addToCart({{ $product->id }})' class="btn btn-primary d-block">
                                <span wire:loading.remove wire:target='addToCart({{ $product->id }})'> Add to cart</span><span wire:loading wire:target='addToCart({{ $product->id }})'>Adding....</span>
                            </button>
                        </div>
                        </div>
                    </main>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
