@extends('theme.default')

@section('content')
<div class="container">
    
    <!-- Display Subcategory Usage Cards -->
    <div class="row">
        @foreach ($subcategories as $subcategory)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $subcategory->name }}</h5>
                        <p class="card-text">Used {{ $subcategory->usage_count }} times</p>
                        <p class="card-text"><strong>Total: ${{ number_format($subcategory->total_price, 2) }}</strong></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    <h2>Transactions</h2>
    <a href="{{ route('admin.transactions.create') }}" class="btn btn-primary mb-3"><i class="mx-2 fas fa-exchange-alt"></i>Add New</a>

    <!-- Transactions Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Package</th>
                <th>Price</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->subcategory->name }}</td>
                    <td>${{ $transaction->price }}</td>
                    <td>{{ $transaction->date }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="1">Total</th>
                <th colspan="2">${{ $total }}</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection
