<div>
    @livewire('partials.navbar')
    @livewire('partials.menubar')
    <div class="page-wrapper">
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                            Overview
                        </div>
                        <h2 class="page-title">
                            Orders
                        </h2>
                    </div>
                    <!-- Page body -->
                    <!-- Page body -->
                    <div class="page-body">
                        <div class="container-xl">
                            @if(session()->has('message'))
                            <div class="alert alert-important alert-success alert-dismissible" role="alert">
                                <div class="d-flex">
                                    <div>
                                        <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon alert-icon">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M5 12l5 5l10 -10"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        {{ session('message') }}
                                    </div>
                                </div>
                                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                            </div>
                            @endif
                            @if (session()->has('error'))
                            <div class="alert alert-important alert-success alert-dismissible" role="alert">
                                <div class="d-flex">
                                    <div>
                                        <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon alert-icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path><path d="M12 8v4"></path><path d="M12 16h.01"></path></svg>
                                    </div>
                                    <div>
                                        {{ session('error') }}
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="card">
                                <div class="card-body border-bottom py-3">
                                    <div class="d-flex">
                                        <div class="text-secondary">
                                            Show
                                            <div class="mx-2 d-inline-block">
                                                <select class="form-select" wire:model.live='perpage'>
                                                    <option value="5">5</option>
                                                    <option value="10">10</option>
                                                    <option value="20">20</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select>
                                            </div>
                                            entries
                                        </div>
                                        <div class="ms-auto text-secondary">
                                            Search:
                                            <div class="ms-2 d-inline-block">
                                                <input wire:model.live.debounce.300ms='search' type="text" class="form-control form-control-sm" aria-label="Search invoice">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table card-table table-vcenter text-nowrap datatable">
                                        <thead>
                                            <tr>
                                                <th class="w-1">No.</th>
                                                <th>Customer</th>
                                                <th>Grand Total</th>
                                                <th>Payment Method</th>
                                                <th>Payment Status</th>
                                                <th>Shipping Method</th>
                                                <th>Status</th>
                                                <th class="w-8">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no=1; @endphp
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td scope="row"><?php echo e($no++) + (($orders->currentPage() - 1) * $orders->perPage()) ?></td>
                                                    <td>{{ $order->user->name }}</td>
                                                    <td>Rp.{{ $order->grand_total }}</td>
                                                    <td>{{ $order->payment_method }}</td>
                                                    <td>
                                                        <select wire:change="updatePaymentStatus({{ $order->id }}, $event.target.value)" class="form-select">
                                                            <option value="paid" {{ $order->payment_status == 'paid' ? 'selected' : '' }}>Paid</option>
                                                            <option value="pending" {{ $order->payment_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                            <option value="unpaid" {{ $order->payment_status == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                                                        </select>
                                                    </td>
                                                    <td>{{ $order->shipping_method }}</td>
                                                    <td>
                                                        <select wire:change="updateStatus({{ $order->id }}, $event.target.value)" class="form-select" >
                                                            <option value="new" {{ $order->status == 'new' ? 'selected' : '' }}>New</option>
                                                            <option value="approved" {{ $order->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <button type="button" wire:click="delete({{$order->id}})" class="btn btn-md btn-danger d-none d-sm-inline-block">Delete</button>
                                                    </td>
                                                </tr>   
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer d-flex align-items-center">
                                    <ul class="pagination m-0 ms-auto">
                                        <li class="page-item">
                                            {{ $orders->links('vendor.pagination.bootstrap-4') }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</div>
