@extends('admin.layouts.template')
@section('page_title')
Add category -siglepage
@endsection
@section('content')
addcate
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-4xl bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold mb-4">Add New Category</h2>
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <form action="{{route('storecategory')}}" method="post">
            @csrf
            <div class="flex justify-between items-center mb-4">
                <label class="block text-gray-600 text-sm font-medium" for="category">
                    CATEGORY NAME
                </label>
                <span class="text-gray-400 text-sm">Input information</span>
            </div>
            <input type="text" id="category_name" name="category_name" placeholder="Enter category name"
                class="w-full border border-purple-300 focus:ring-2 focus:ring-purple-400 focus:border-purple-400 rounded-lg px-4 py-3 outline-none text-lg" required>
            <button type="submit"
                class="mt-6 bg-purple-600 text-white px-6 py-3 rounded-lg hover:bg-purple-700 transition w-full sm:w-auto">
                Add Category
            </button>
        </form>
    </div>
</div>


@endsection