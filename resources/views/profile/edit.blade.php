@extends('user_template.layouts.userprofile_template')

@section('profilecontent')
<div class="container mx-auto px-6 py-8">
    <h2 class="text-3xl font-extrabold text-gray-900 text-center mb-8">User Profile</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @include('profile.partials.update-profile-information-form')
        @include('profile.partials.update-password-form')
    </div>

    @include('profile.partials.delete-user-form')
</div>
@endsection
