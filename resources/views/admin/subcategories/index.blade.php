@extends('theme.default')
@section('heading')
 Show packages
@endsection

@section('content')
<div class="container text-center">
<h2>Packages</h2>
<a href="{{route ('subcategories.create')}}" class="btn btn-primary mb-3"><i class=" mx-2 fas fa-plus"></i>Add New package</a>
    <!-- Dropdown for Categories -->
    <div class="mb-3">
        <label for="categoryFilter" class="form-label">Filter by Category:</label>
            <select id="categoryFilter" class="form-select" onchange="filterByCategory(this.value)">
                <option value="all" {{ request('category') == 'all' || is_null(request('category')) ? 'selected' : '' }}>All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
    </div>

    <!-- Table for Subcategories -->
    <div class="row">
    <div class="col-md-12">
        <!-- Add horizontal scroll -->
        <div class="table-responsive">
            <table id="subcategory-table" class="table table-striped table-bordered text-center" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>package Name</th>
                        <th>service</th>
                        <th>Description</th>
                        <th>price</th>

                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subcategories as $subcategory)
                        <tr>
                            <td>
                                <div  style="width: 60px; height: 60px; object-fit: cover;">
                                <picture >
                                    <source srcset="{{ $subcategory->getFirstMediaUrl('sub_categories', 'webp') }}" type="image/webp">
                                    <img src="{{ $subcategory->getFirstMediaUrl('sub_categories') }}" alt="{{ $subcategory->name }}" class="card-img-top" loading="lazy">
                                </picture>
                              </div>
                            </td>
                            <td>{{ $subcategory->name }}</td>
                            <td>{{ $subcategory->category->name }}</td>
                            <td style="max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                {{ $subcategory->description }}
                            </td>
                            <td>{{ $subcategory->price }} $</td>

                            <td>
                            <a href="{{ route('subcategories.showadmin', $subcategory->id) }}" class="btn btn-info">View</a>
                                <a href="{{ route('subcategories.edit', $subcategory->id) }}" class="btn btn-sm btn-info">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                           
                            <!-- زر الحذف -->
                            <a href="#" class="btn btn-danger" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this subcategory?')) document.getElementById('delete-form-{{ $subcategory->id }}').submit();">
                                Delete
                            </a>

                            <form id="delete-form-{{ $subcategory->id }}" action="{{ route('subcategories.destroy', $subcategory->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                            </td>
                        </tr>
                    @endforeach
 
                </tbody>

            </table>
        </div>
    </div>
</div>

</div>

<script>
    function filterByCategory(categoryId) {
        let url = '/admin/subcategories/filter/';
        if (categoryId === 'all') {
            url = '/admin/subcategories';
        } else {
            url += categoryId;
        }
        window.location.href = url;
    }
</script>




@endsection