@extends('theme.default')

@section('content')
<div class="container">
    <h2>All Payments</h2>

    <!-- نموذج الفلترة -->
    <form action="{{ route('admin.payments.filter') }}" method="POST" class="mb-3">
        @csrf
        <div class="row">
            <div class="col-md-5">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" id="start_date" name="start_date" class="form-control" value="{{ old('start_date', $start_date ?? '') }}">
            </div>
            <div class="col-md-5">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" id="end_date" name="end_date" class="form-control" value="{{ old('end_date', $end_date ?? '') }}">
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>

    <!-- عرض الجدول المدفوعات -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Worker Name</th>
                    <th>Payment Type</th>
                    <th>Amount</th>
                    <th>Payment Date</th>
                    <th>Notes</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $payment->worker->name }}</td>
                    <td>{{ $payment->type }}</td>
                    <td>{{ $payment->amount }}</td>
                    <td>{{ $payment->payment_date }}</td>
                    <td>{{ $payment->notes }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3"><strong>Total Amount:</strong></td>
                    <td colspan="3">
                        <strong>
                            {{ $payments->sum('amount') }} <!-- حساب مجموع المدفوعات -->
                        </strong>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

    <a href="{{ route('admin.workers.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
