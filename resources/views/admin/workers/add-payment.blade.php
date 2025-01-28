@extends('theme.default')

@section('content')
<div class="container">
    <h2>Add Payment for Worker: {{ $worker->name }}</h2>

    <!-- نموذج إضافة معاملة جديدة -->
    <form action="{{ route('admin.workers.payments.store', $worker->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="type" class="form-label">Payment Type</label>
            <select id="type" name="type" class="form-control" required>
                <option value="salary">Salary</option>
                <option value="advance">Advance</option>
                <option value="bonus">Bonus</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" id="amount" name="amount" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="payment_date" class="form-label">Payment Date</label>
            <input type="date" id="payment_date" name="payment_date" class="form-control" value="{{ \Carbon\Carbon::today()->toDateString() }}" required>
        </div>

        <div class="mb-3">
            <label for="notes" class="form-label">Notes</label>
            <textarea id="notes" name="notes" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Payment</button>
    </form>

    <a href="{{ route('admin.workers.payments', $worker->id) }}" class="btn btn-secondary mt-3">Back to Payments</a>
</div>
@endsection
