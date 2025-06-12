@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="w-full mx-auto max-w-4xl">
    <div class="bg-white shadow rounded-2xl p-6 sm:p-8 mb-4">
        <h2 class="font-semibold text-lg sm:text-xl text-orange-700 mb-2">
            Dashboard
        </h2>
        <div class="text-gray-900 text-base sm:text-lg">
            {{ __("You're logged in!") }}
        </div>
    </div>
</div>
@endsection
