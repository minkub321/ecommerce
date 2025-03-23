@extends('admin.layouts.template')

@section('page_title')
Add SubCategory - Single Page
@endsection

@section('content')

<div class="flex justify-center items-center min-h-screen bg-gray-100 p-4">
    <div class="w-full max-w-lg bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Add New Sub Category</h2>

        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{route('storesubcategory')}}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-600 text-sm font-medium mb-2" for="sub_category_name">
                    SUB CATEGORY NAME
                </label>
                <input id="subcategory_name" name="subcategory_name" type="text" placeholder="Enter sub category name"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-600 text-sm font-medium mb-2" for="category_id">
                    SELECT CATEGORY
                </label>
                <select id="category_id" name="category_id"
                    class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option selected>Select a category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700">
                Add SubCategory
            </button>
        </form>
    </div>
</div>

@endsection
