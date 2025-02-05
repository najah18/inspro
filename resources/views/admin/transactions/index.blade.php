@extends('theme.default')

@section('head')
<link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

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
    <button class="btn btn-info mb-3" onclick="printInvoice()">Print Invoice</button>
    <!-- Transactions Table -->
    <table class="table table-bordered" id="transaction-table">
        <thead>
            <tr>
                <th>Category</th> <!-- إضافة العمود الخاص بالفئة -->
                <th>Package</th>
                <th>Price</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->subcategory->category->name }}</td> <!-- عرض اسم الفئة -->
                    <td>{{ $transaction->subcategory->name }}</td>
                    <td>${{ $transaction->price }}</td>
                    <td>{{ $transaction->date }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2">Total</th>
                <th colspan="2">${{ $total }}</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection

@section('script')
<!-- Page level plugins -->
<script src="{{ asset('theme/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#transaction-table').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/English.json" // استخدم الترجمة الإنجليزية
            }
        });
    });
</script>

<!-- print -->


<script>
    function printInvoice() {
        var content = document.getElementById('transaction-table').outerHTML;
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
