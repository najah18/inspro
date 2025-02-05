@extends('theme.default')
@section('head')
<link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <h2>Invoices List</h2>

    <!-- Filter Form -->
    <form method="GET" action="{{ route('admin.invoices.index') }}" class="mb-3">
        <div class="form-group">
            <label for="invoice_category">Invoice Category</label>
            <select name="invoice_category" id="invoice_category" class="form-control">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" 
                        {{ request('invoice_category') == $category->id ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control" 
                value="{{ request('start_date') }}">
        </div>

        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" id="end_date" class="form-control" 
                value="{{ request('end_date') }}">
        </div>

        <button type="submit" class="btn btn-primary">Filter</button>
    </form>

    <!-- Add New Invoice Button -->
    <a href="{{ route('admin.invoices.create') }}" class="btn btn-success mb-3">Add New Invoice</a>
     <!-- طباعة الفاتورة -->
     <button class="btn btn-info mb-3" onclick="printInvoice()">Print Invoice</button>

    <!-- Table to display the invoices -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="invoices-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Invoice Number</th>
                    <th>Invoice Name</th>
                    <th>Invoice Date</th>
                    <th>Invoice Price</th>
                    <th>Invoice Category</th>
                    <th>Invoice File</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($invoices as $invoice)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $invoice->invoice_number }}</td>
                    <td>{{ $invoice->invoice_name }}</td>
                    <td>{{ $invoice->invoice_date }}</td>
                    <td>{{ $invoice->price }}</td>
                    <td>{{ $invoice->invoiceCategory->category_name }}</td>
                    <td>
                        <a href="{{ asset('storage/' . $invoice->file_path) }}" target="_blank">View File</a>
                    </td>
                    <td>
                        <!-- Edit Button -->
                        <a href="{{ route('admin.invoices.edit', $invoice->id) }}" class="btn btn-primary btn-sm">Edit</a>

                        <!-- Delete Button -->
                        <form action="{{ route('admin.invoices.destroy', $invoice->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this invoice?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @php $total += $invoice->price; @endphp
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="text-right"><strong>Total:</strong></td>
                    <td><strong>{{ $total }}</strong></td>
                    <td colspan="3"></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@endsection
@section('script')
<!-- Page level plugins -->
<script src="{{ asset('theme/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#invoices-table').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/English.json"
            }
        });
    });
</script>

<!-- طباعة -->
<script>
    function printInvoice() {
        var content = document.getElementById('invoices-table').outerHTML;
        var logoUrl = "{{ asset('images/logo.png') }}"; 
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
