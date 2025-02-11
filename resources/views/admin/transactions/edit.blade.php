@extends('theme.default')

@section('content')
<div class="container">
    <h2>Edit Transaction</h2>
    
    <!-- بدء نموذج التعديل -->
    <form action="{{ route('admin.transactions.update', $transaction->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- لتحديد أن هذه عملية تحديث -->

        <!-- Dropdown لاختيار التصنيف الفرعي -->
        <div class="mb-3">
            <label for="subcategory" class="form-label">Select a Package</label>
            <select id="subcategory" name="subcategory_id" class="form-select" required>
                <option value="" disabled>Select a subcategory</option>
                @foreach ($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}" {{ $transaction->subcategory_id == $subcategory->id ? 'selected' : '' }}>
                        {{ $subcategory->name }} - ${{ $subcategory->price }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- حقل تعديل السعر -->
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" id="price" name="price" class="form-control" value="{{ $transaction->price }}" required>
        </div>

        <!-- حقل تعديل التاريخ -->
        <div class="mb-3">
            <label for="date" class="form-label">Transaction Date</label>
            <input type="date" id="date" name="date" class="form-control" value="{{ $transaction->date }}" required>
        </div>

        <!-- زر التحديث -->
        <button type="submit" class="btn btn-primary">Update Transaction</button>
    </form>
</div>
@endsection
