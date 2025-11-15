
@extends('admin.layout')

@section('title', 'Edit Product')

@section('header', 'Edit Product')

@section('content')
<div class="max-w-2xl">
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium mb-1">Name</label>
            <input type="text" name="name" id="name" class="form-input" value="{{ old('name', $product->name) }}" required>
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="category_id" class="block text-sm font-medium mb-1">Category</label>
            <select name="category_id" id="category_id" class="form-input" required>
                <option value="">Select a category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ (old('category_id', $product->category_id) == $category->id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="price" class="block text-sm font-medium mb-1">Price (in cents)</label>
            <input type="number" name="price" id="price" class="form-input" value="{{ old('price', $product->price) }}" required>
            @error('price')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium mb-1">Product Image</label>
            <input type="file" name="image" id="image" class="form-input">
            @if($product->images)
                <div class="mt-2">
                    <p class="text-sm text-gray-600 mb-2">Current image:</p>
                    <div class="border rounded-lg p-2 inline-block">
                        <img src="{{ asset('storage/' . $product->images) }}" alt="{{ $product->name }}" class="w-48 h-48 object-cover rounded">
                    </div>
                    <p class="text-gray-500 text-xs mt-2">File: {{ basename($product->images) }}</p>
                    <p class="text-gray-500 text-xs mt-1">Leave blank to keep current image</p>
                </div>
            @else
                <p class="text-gray-500 text-sm mt-2">No image uploaded yet</p>
            @endif
            @error('image')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium mb-1">Description</label>
            <textarea name="description" id="description" class="form-input" rows="5" required>{{ old('description', $product->description) }}</textarea>
            @error('description')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex items-center justify-between">
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Update Product</button>
        </div>
    </form>
</div>
@endsection