@extends(Auth::user()->role == 'teacher' ? 'layouts.teacher' : 'layouts.student')

@section('content')
    <div class="space-y-6">
        <h1 class="text-2xl font-bold text-purple-700">Edit Profil</h1>

        <div class="bg-white p-4 sm:p-8 rounded-lg shadow-md">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="bg-white p-4 sm:p-8 rounded-lg shadow-md">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="bg-white p-4 sm:p-8 rounded-lg shadow-md">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
@endsection