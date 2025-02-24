@extends('layouts.master')
@section('title','Subscription Create')
@section('content')

    <div class="container mx-auto p-4">
        <div class="card-header border-b border-gray-200 mb-4">
            <h1 class="text-2xl font-bold mb-4">Create Subscription Type</h1>

                <!-- <a href="{{ url('subscription-types') }}">
                    <button class="bg-red-500 text-black py-1 px-2 rounded-md hover:bg-gray-700
                                 transition duration-300">
                        Back
                    </button>
                </a> -->
        </div>

        <form action="{{ route('activity.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Type</label>
                <input type="text" name="type" id="type" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Duration</label>
                <input type="text" name="duration" id="duration" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Distance</label>
                <input type="text" name="distance" id="distance" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">CaloriesBurned</label>
                <input type="text" name="calories_burned" id="calories_burned" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Date</label>
                <input type="date" name="date" id="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">Submit</button>
        </form>
    </div>

@endsection
