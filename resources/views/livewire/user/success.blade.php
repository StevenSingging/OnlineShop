<div>
  @livewire('partials.navbar')
  @livewire('partials.menubar')
    <div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">
              <div class="card card-lg">
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <p class="h3">Company</p>
                      <address>
                        Street Address<br>
                        State, City<br>
                        Region, Postal Code<br>
                        ltd@example.com
                      </address>
                    </div>
                    <div class="col-6 text-end">
                      <p class="h3">{{ $order->address->full_name }}</p>
                      <address>
                        {{ $order->address->street_address }}<br>
                        {{ $order->address->state }}, {{ $order->address->city }}<br>
                        {{ $order->address->zip_code }}<br>
                      </address>
                    </div>
                    <div class="col-12 my-5">
                      <h1>Invoice</h1>
                    </div>
                  </div>
                  <table class="table table-transparent table-responsive">
                    <thead>
                      <tr>
                        <th>Order Number</th>
                        <th class="text-center" style="width: 1%">Date</th>
                        <th class="text-end" style="width: 1%">Total</th>
                        <th class="text-end" style="width: 1%">Payment Method</th>
                      </tr>
                    </thead>
                    <tr>
                      <td>
                        {{ $order->id }}
                      </td>
                      <td class="text-center">
                        {{ $order->created_at->format('d F Y') }}
                      </td>
                      <td class="text-end">{{ Number::currency($order->grand_total, 'IDR') }}</td>
                      <td class="text-end">{{ $order->payment_method == 'cash' ? 'Cash' : 'Credit'}}</td>
                    </tr>
                  </table>
                  <p class="text-secondary text-center mt-5">Thank you very much for doing business with us. We look forward to working with
                    you again!</p>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
