@extends('theme.default')

@section('content')
<div class="container">
    <h2>Payments for Worker: {{ $worker->name }}</h2>

    <!-- جدول المدفوعات -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Payment Date</th>
                <th>Notes</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $payment->type }}</td>
                <td>{{ $payment->amount }}</td>
                <td>{{ $payment->payment_date }}</td>
                <td>{{ $payment->notes }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- زر إضافة معاملة جديدة -->
    <a href="{{ route('admin.workers.payments.add', $worker->id) }}" class="btn btn-success">Add New Payment</a>

    <a href="{{ route('admin.workers.index') }}" class="btn btn-secondary mt-3">Back to Workers List</a>
</div>
@endsection
