@extends('admin.layout')

@section('title', 'Manage Categories')

@section('header', 'Categories')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">Categories</h2>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Add Category</a>
</div>

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    @if($categories->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->created_at->format('M d, Y') }}</td>
                        <td class="flex space-x-2">
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-secondary text-sm">Edit</a>
                            
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger text-sm" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="p-6 text-center">
            <p class="text-gray-500">No categories found.</p>
        </div>
    @endif
</div>
@endsection