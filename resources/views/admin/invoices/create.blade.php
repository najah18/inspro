@extends('theme.default')

@section('content')
<div class="container">
    <h2>Create Invoice</h2>

    <!-- Form to create a new invoice -->
    <form action="{{ route('admin.invoices.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="invoice_category_id">Invoice Category</label>
        <select name="invoice_category_id" id="invoice_category_id" class="form-control @error('invoice_category_id') is-invalid @enderror" required>
            <option value="">Select Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('invoice_category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->category_name }}
                </option>
            @endforeach
        </select>
        @error('invoice_category_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="invoice_number">Invoice Number</label>
        <input type="text" name="invoice_number" id="invoice_number" class="form-control @error('invoice_number') is-invalid @enderror" value="{{ old('invoice_number') }}" required>
        @error('invoice_number')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="invoice_name">Invoice Name</label>
        <input type="text" name="invoice_name" id="invoice_name" class="form-control @error('invoice_name') is-invalid @enderror" value="{{ old('invoice_name') }}" required>
        @error('invoice_name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="invoice_date">Invoice Date</label>
        <input type="date" name="invoice_date" id="invoice_date" class="form-control @error('invoice_date') is-invalid @enderror" value="{{ old('invoice_date', \Carbon\Carbon::today()->toDateString()) }}" required>
        @error('invoice_date')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" required>
        @error('price')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="file">Invoice File</label>
        <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror" required>
        @error('file')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Save Invoice</button>
</form>

</div>
@endsection
