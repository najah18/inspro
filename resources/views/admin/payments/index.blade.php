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

    <!-- طباعة الفاتورة -->
    <button class="btn btn-info mb-3" onclick="printInvoice()">Print Invoice</button>

    <!-- عرض الجدول المدفوعات -->
    <div class="table-responsive">
        <table  id="invoiceTable"  class="table table-striped table-bordered">
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

@section('script')

<script>
    function printInvoice() {
        var content = document.getElementById('invoiceTable').outerHTML;
        var logoUrl = "{{ asset('images/logo.png') }}"; // تأكد من وضع مسار اللوغو الصحيح
        var printWindow = window.open('', '', 'width=900,height=600');

        printWindow.document.write('<html><head><title>Invoice</title>');
        printWindow.document.write('<style>');
        printWindow.document.write('body {text-align: center; font-family: Arial, sans-serif;}');
        printWindow.document.write('table {width: 100%; border-collapse: collapse; margin-top: 20px;}');
        printWindow.document.write('th, td {border: 1px solid black; padding: 8px; text-align: center;}');
        printWindow.document.write('@media print {button {display: none;}}');
        printWindow.document.write('</style>');
        printWindow.document.write('</head><body>');

        // إضافة اللوغو فقط بدون نصوص أخرى
        printWindow.document.write('<div style="text-align: center; margin-bottom: 20px;">');
        printWindow.document.write('<img src="' + logoUrl + '" alt="Logo" style="width: 150px; height: auto;">');
        printWindow.document.write('</div>');

        // طباعة الجدول
        printWindow.document.write(content);
        printWindow.document.write('</body></html>');

        printWindow.document.close();
        printWindow.print();
    }
</script>


@endsection