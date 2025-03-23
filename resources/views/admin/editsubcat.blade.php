@extends('admin.layouts.template')

@section('page_title')
Edit SubCategory - Single Page
@endsection

@section('content')

<div class="flex justify-center items-center min-h-screen bg-gray-100 p-4">
    <div class="w-full max-w-lg bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Edit New Sub Category</h2>

        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{route('updatesubcat')}}" method="POST">
            @csrf
    <input type="hidden" value="{{$subcatinfo->id}}" name="subcatid">
            <div class="mb-4">
                <label class="block text-gray-600 text-sm font-medium mb-2" for="sub_category_name">
                    SUB CATEGORY NAME
                </label>
                <input id="subcategory_name" name="subcategory_name" type="text" value="{{$subcatinfo->subcategory_name}}"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>


            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700">
              Update SubCategory
            </button>
        </form>
    </div>
</div>

@endsection
