@extends('admin.layout')

@section('title', 'Manage Products')

@section('header', 'Products')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">Products</h2>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Add Product</a>
</div>

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    @if($products->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->name ?? 'N/A' }}</td>
                        <td>${{ number_format($product->price / 100, 2) }}</td>
                        <td>{{ $product->created_at->format('M d, Y') }}</td>
                        <td class="flex space-x-2">
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-secondary text-sm">Edit</a>
                            
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger text-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="p-6 text-center">
            <p class="text-gray-500">No products found.</p>
        </div>
    @endif
</div>
@endsection