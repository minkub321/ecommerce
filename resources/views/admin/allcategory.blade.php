@extends('admin.layouts.template')

@section('page_title')
All Categories - Single Page
@endsection

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100 p-4">
    <div class="w-full max-w-5xl bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">All Categories</h2>
        @if(session()->has('message'))
        <div class="alert alert-success">
                {{ session()->get('message')}}
        </div>
        @endif
        <table class="w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2 text-left">ID</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">CATEGORY NAME</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">SUB CATEGORY</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Slug</th>
            
                    <th class="border border-gray-300 px-4 py-2 text-left">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
              
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-300 px-4 py-2">{{$category->id}}</td>
                    <td class="border border-gray-300 px-4 py-2">{{$category->category_name}}</td>
                    <td class="border border-gray-300 px-4 py-2">{{$category->subcategory_count}}</td>
                    <td class="border border-gray-300 px-4 py-2">{{$category->slug}}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{route('editcategory',$category->id)}}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                            Edit
                        </a>
                        <a  href="{{ route('deletecategory', $category->id) }}" class="bg-orange-500 text-white px-3 py-1 rounded hover:bg-orange-600 ml-2">
                            Delete
                        </a>
                    </td>
                </tr>  @endforeach
            </tbody>
        </table>
    </div>
</div>





@endsection
