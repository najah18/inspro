@extends('theme.default')

@section('content')
<div class="container">
    <h2>Edit Payment</h2>

    <form action="{{ route('admin.payments.update', $payment->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Type</label>
            <input type="text" name="type" class="form-control" value="{{ $payment->type }}" required>
        </div>

        <div class="form-group">
            <label>Amount</label>
            <input type="number" name="amount" class="form-control" value="{{ $payment->amount }}" required>
        </div>

        <div class="form-group">
            <label>Payment Date</label>
            <input type="date" name="payment_date" class="form-control" value="{{ $payment->payment_date }}" required>
        </div>

        <div class="form-group">
            <label>Notes</label>
            <textarea name="notes" class="form-control">{{ $payment->notes }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Payment</button>
        <a href="{{ route('admin.workers.payments', $payment->worker_id) }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
