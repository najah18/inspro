@extends('theme.default')
@section('head')
<link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        @media print {
            body * {
                visibility: hidden;
            }
            #invoice-content, #invoice-content * {
                visibility: visible;
            }
            #invoice-content {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="container mt-4">

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
    <!-- زر الطباعة -->
    <a href="{{ route('admin.transactions.create') }}" class="btn btn-primary mb-3"><i class="mx-2 fas fa-exchange-alt"></i>Add transactions</a>
    <a href="{{ route('admin.incomes.create') }}" class="btn btn-primary mb-3"><i class="mx-2 fas fa-exchange-alt"></i>Add incomes</a>

    <button class="btn btn-info mb-3"  onclick="printSelectedTables()">Print Invoice</button>

    <div id="invoice-content">


        <!-- جدول المعاملات Transactions -->
        <h2>Transactions</h2>
        <div class="table-responsive">
        <table class="table table-bordered table-striped" id="transaction-table">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Package</th>
                    <th>Price</th>
                    <th>Date</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @php $total1 = 0 @endphp
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->subcategory->category->name }}</td> <!-- عرض اسم الفئة -->
                    <td>{{ $transaction->subcategory->name }}</td>
                    <td>{{ $transaction->price }}$</td>
                    <td>{{ $transaction->date }}</td>
                    <td>
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="{{route('admin.transactions.edit', $transaction->id )}}" class="btn btn-primary mb-3 mr-2">Edit</a>
                            <form action="{{ route('admin.transactions.destroy', $transaction->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this transaction?');" class="d-flex align-items-center">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>



                </tr>

               @php $total1 += $transaction->price @endphp
            @endforeach
            <tfoot>
                <tr>
                <td colspan="2">total price :</td>
                <td colspan="2">{{$total1 }} $ </td>
                </tr>
            </tfoot>
            </tbody>
        </table>
        </div>

        <!-- جدول الدخل Incomes -->
        <h2 class="mt-4">Incomes</h2>
        <div class="table-responsive">

        <table class="table table-bordered table-striped" id="income-table">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Date</th>
                    <th>Image</th> 
                    <th>Action</th>  
                </tr>
            </thead>
            <tbody>
            @php $total2 = 0 @endphp
            @foreach ($incomes as $income)
                <tr>
                    <td>{{$income->description}}</td>
                    <td>{{$income->name}}</td>
                    <td>{{$income->price}}$</td>
                    <td>{{$income->date}}</td>
                    <td>
                        @if($income->getFirstMediaUrl('incomes'))
                            <!-- رابط الصورة إلى الصفحة الجديدة -->
                            <a href="{{ $income->getFirstMediaUrl('incomes') }}" target="_blank">
                                <img src="{{ $income->getFirstMediaUrl('incomes', 'thumb') }}" width="50" height="50" alt="Income Image">
                            </a>
                        @else
                            No Image
                        @endif
                    </td>

                    <td>
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="{{route('admin.incomes.edit', $income->id )}}" class="btn btn-primary mb-3 mr-2">Edit</a>
                            <form action="{{ route('admin.incomes.destroy', $income->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this transaction?');" class="d-flex align-items-center">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @php $total2 += $income->price @endphp
            @endforeach
            <tfoot>
            <tr>
                <td colspan="2">total price :</td>
                <td colspan="2">{{$total2 }}$</td>
            </tr>
            </tfoot>
            </tbody>
        </table>
        </div>

        <!-- المجموع النهائي -->
        @php $finaltotal = $total1 + $total2 @endphp
        <h3 class="text-end mt-3" id="grand-total">Grand Total: {{$finaltotal}}$</h3>
    </div>
</div>
@endsection
@section('script')
<!-- Page level plugins transection table -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('theme/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- transection -->
 <script>
$(document).ready(function() {
    $('#transaction-table').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json" // استخدام الترجمة العربية إذا كان ذلك مناسباً
        }
    });
    $('#income-table').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json" // استخدام الترجمة العربية إذا كان ذلك مناسباً
        }
    });
});
</script>

<script>
    function printSelectedTables() {
        var printWindow = window.open('', '', 'width=900,height=600');

        function getFirstFourColumns(tableId) {
            var originalTable = document.getElementById(tableId);
            var newTable = originalTable.cloneNode(false); // نسخ الجدول بدون الصفوف

            // إنشاء رؤوس الأعمدة الجديدة
            var header = originalTable.querySelector('thead').cloneNode(false);
            var headerRow = originalTable.querySelector('thead tr');
            var newHeaderRow = document.createElement('tr');
            for (var i = 0; i < 4; i++) {
                newHeaderRow.appendChild(headerRow.cells[i].cloneNode(true));
            }
            header.appendChild(newHeaderRow);
            newTable.appendChild(header);

            // إنشاء صفوف البيانات الجديدة
            var body = originalTable.querySelector('tbody').cloneNode(false);
            Array.from(originalTable.querySelectorAll('tbody tr')).forEach(function(row) {
                var newRow = document.createElement('tr');
                for (var i = 0; i < 4; i++) {
                    newRow.appendChild(row.cells[i].cloneNode(true));
                }
                body.appendChild(newRow);
            });
            newTable.appendChild(body);

            return newTable.outerHTML;
        }

        var transactionsTable = getFirstFourColumns('transaction-table');
        var incomesTable = getFirstFourColumns('income-table');
        var totalAmount = document.getElementById('grand-total').outerHTML;

        printWindow.document.write('<html><head><title>Print Invoice</title>');
        printWindow.document.write('<style>');
        printWindow.document.write('body { font-family: Arial, sans-serif; text-align: center; padding: 20px; }');
        printWindow.document.write('table { width: 100%; border-collapse: collapse; margin-top: 20px; }');
        printWindow.document.write('th, td { border: 1px solid black; padding: 8px; text-align: center; }');
        printWindow.document.write('@media print { button { display: none; } }');
        printWindow.document.write('</style>');
        printWindow.document.write('</head><body>');

        printWindow.document.write('<h2>Transactions</h2>');
        printWindow.document.write(transactionsTable);
        printWindow.document.write('<h2>Incomes</h2>');
        printWindow.document.write(incomesTable);
        printWindow.document.write('<h3>' + totalAmount + '</h3>');

        printWindow.document.write('</body></html>');

        printWindow.document.close();
        printWindow.print();
    }
</script>


@endsection
