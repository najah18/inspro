@extends('theme.default')

@section('content')
<div class="container">
    <h2>Create Invoice</h2>

    <!-- Form to create a new invoice -->
    <form action="{{ route('admin.invoices.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="invoice_category_id">Invoice Category</label>
        <select name="invoice_category_id" id="invoice_category_id" class="form-control" required>
            <option value="">Select Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="invoice_number">Invoice Number</label>
        <input type="text" name="invoice_number" id="invoice_number" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="invoice_name">Invoice Name</label>
        <input type="text" name="invoice_name" id="invoice_name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="invoice_date">Invoice Date</label>
        <input type="date" name="invoice_date" id="invoice_date" value="{{ \Carbon\Carbon::today()->toDateString() }}" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="file">Invoice File</label>
        <input type="file" name="file" id="file" class="form-control" required>
    </div>




    <button type="submit" class="btn btn-primary">Save Invoice</button>
</form>

</div>
@endsection
