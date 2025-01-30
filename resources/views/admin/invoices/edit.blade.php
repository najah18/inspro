@extends('theme.default')

@section('content')
<div class="container">
    <h2>Edit Invoice</h2>

    <!-- عرض رسائل الأخطاء العامة -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Edit Invoice Form -->
    <form method="POST" action="{{ route('admin.invoices.update', $invoice->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Invoice Number -->
        <div class="form-group">
            <label for="invoice_number">Invoice Number</label>
            <input type="text" name="invoice_number" id="invoice_number" class="form-control @error('invoice_number') is-invalid @enderror" value="{{ old('invoice_number', $invoice->invoice_number) }}" required>
            <!-- عرض رسالة الخطأ لـ invoice_number -->
            @error('invoice_number')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Invoice Name -->
        <div class="form-group">
            <label for="invoice_name">Invoice Name</label>
            <input type="text" name="invoice_name" id="invoice_name" class="form-control @error('invoice_name') is-invalid @enderror" value="{{ old('invoice_name', $invoice->invoice_name) }}" required>
            <!-- عرض رسالة الخطأ لـ invoice_name -->
            @error('invoice_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Invoice Date -->
        <div class="form-group">
            <label for="invoice_date">Invoice Date</label>
            <input type="date" name="invoice_date" id="invoice_date" class="form-control @error('invoice_date') is-invalid @enderror" value="{{ old('invoice_date', $invoice->invoice_date) }}" required>
            <!-- عرض رسالة الخطأ لـ invoice_date -->
            @error('invoice_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        
        <!-- Invoice price -->
        <div class="form-group">
            <label for="price">price </label>
            <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $invoice->price) }}" required>
            <!-- عرض رسالة الخطأ لـ price -->
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Invoice Category -->
        <div class="form-group">
            <label for="invoice_category">Invoice Category</label>
            <select name="invoice_category_id" id="invoice_category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" 
                        {{ old('invoice_category_id', $invoice->invoice_category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
            <!-- عرض رسالة الخطأ لـ invoice_category -->
            @error('invoice_category')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Invoice File -->
        <div class="form-group">
            <label for="file">Invoice File</label>
            <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror">
            <!-- عرض رسالة الخطأ لـ file -->
            @error('file')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <small class="form-text text-muted">Leave blank to keep the current file.</small>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update Invoice</button>
    </form>
</div>
@endsection