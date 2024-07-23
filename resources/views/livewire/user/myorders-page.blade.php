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
                            My Orders
                        </h2>
                    </div>
                    <!-- Page body -->
                    <!-- Page body -->
                    <div class="page-body">
                        <div class="container-xl">
                            <div class="card">
                                <div class="table-responsive">
                                    <table class="table card-table table-vcenter text-nowrap datatable">
                                        <thead>
                                            <tr>
                                                <th>Order</th>
                                                <th>Date</th>
                                                <th>Order Status</th>
                                                <th>Order Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                                @php 
                                                $status = '';
                                                if($order->status == 'new'){
                                                $status = '<span class="badge bg-blue text-blue-fg">New</span>';
                                                }
                                                if($order->status == 'processing'){
                                                $status = '<span class="badge bg-yellow text-yellow-fg">Processing</span>';
                                                }
                                                if($order->status == 'cancelled'){
                                                $status = '<span class="badge bg-red text-red-fg">Cancelled</span>';
                                                }
                                                if($order->status == 'approved'){
                                                $status = '<span class="badge bg-green text-green-fg">Approved</span>';
                                                }
                                                @endphp
                                                <tr>
                                                    <td>{{ $order->id }}</td>
                                                    <td>{{ $order->created_at->format('d-m-Y') }}</td>
                                                    <td>{!! $status !!}</td>
                                                    <td>{{ Number::currency($order->grand_total, 'Rp.') }}</td>
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
</div>
