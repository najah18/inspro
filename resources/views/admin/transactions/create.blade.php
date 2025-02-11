@extends('theme.default')

@section('content')
<div class="container">
    <h2>Add Transaction</h2>
    <form action="{{ route('admin.transactions.create') }}" method="GET">
    @csrf
        <!-- Dropdown for Categories -->
        <div class="mb-3">
            <label for="categoryFilter" class="form-label">Filter by service:</label>
            <select id="categoryFilter" name="category" class="form-select" onchange="this.form.submit()">
                <option value="" disabled {{ is_null($selectedCategory) ? 'selected' : '' }}>Select a service</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $selectedCategory == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </form>

    <!-- Subcategory Dropdown -->
    @if ($selectedCategory)
        <form action="{{ route('admin.transactions.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="subcategory" class="form-label">Select a Package </label>
                <select id="subcategory" name="subcategory_id" class="form-select" required>
                    <option value="" disabled selected>Select a subcategory</option>
                    @foreach ($subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }} - ${{ $subcategory->price }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="number" class="form-label">
                    price
                </label>
                <input type="number" id="price" name="price" class="form-control" >
            </div>
            <!-- Date Field -->
            <div class="mb-3">
                <label for="date" class="form-label">Transaction Date</label>
                <input type="date" id="date" name="date" class="form-control" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Transaction</button>
        </form>
    @endif
</div>
@endsection
