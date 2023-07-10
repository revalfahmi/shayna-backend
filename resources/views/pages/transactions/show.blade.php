<table class="table-bordered">
    <tr>
        <th>Name</th>
        <td>{{ $items->name }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $items->email }}</td>
    </tr>
    <tr>
        <th>Number</th>
        <td>{{ $items->number }}</td>
    </tr>
    <tr>
        <th>Address</th>
        <td>{{ $items->address }}</td>
    </tr>
    <tr>
        <th>Transaction Total</th>
        <td>{{ $items->transaction_total }}</td>
    </tr>
    <tr>
        <th>Transaction Status</th>
        <td>{{ $items->transaction_status }}</td>
    </tr>
    <tr>
        <th>Purchase Produk</th>
        <td>
            <table class="table table-bordered w-100">
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Price</th>
                </tr>
                @foreach ($items->transactionDetail as $detail)
                    <tr>
                        <td>{{ $detail->product->name }}</td>
                        <td>{{ $detail->product->type }}</td>
                        <td>{{ $detail->product->price }}</td>
                    </tr>
                @endforeach
            </table>
        </td>
    </tr>
</table>
{{-- <div class="row">
    <div class="col-4">
        <a href="{{ route('transaction.status', $items->id) }}?status=SUCCESS" class="btn btn-success btn-block">
            <i class="fa fa-check"></i> Set Success
        </a>
    </div>
    <div class="col-4">
        <a href="{{ route('transaction.status', $items->id) }}?status=FAILED" class="btn btn-danger btn-block">
            <i class="fa fa-times"></i> Set Failed
        </a>
    </div>
    <div class="col-4">
        <a href="{{ route('transaction.status', $items->id) }}?status=PENDING" class="btn btn-info btn-block">
            <i class="fa fa-spinner"></i> Set Pending
        </a>
    </div>
</div> --}}