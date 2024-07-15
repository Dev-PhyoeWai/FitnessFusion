@extends('layouts.master')
@section('title','Subscription Create')
@section('content')

    <div class="container mx-auto p-4">
        <div class="card-header border-b border-gray-200 mb-4">
            <h1 class="text-2xl font-bold mb-4">Create Goals Type</h1>

                <!-- <a href="{{ url('subscription-types') }}">
                    <button class="bg-red-500 text-black py-1 px-2 rounded-md hover:bg-gray-700
                                 transition duration-300">
                        Back
                    </button>
                </a> -->
        </div>

        <form action="{{ route('goal.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">GoalsType</label>
                <input type="text" name="type" id="type" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">TargetValue</label>
                <input type="text" name="targetvalue" id="targetvalue" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Progress</label>
                <input type="text" name="progress" id="progress" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Deadline</label>
                <input type="date" name="deadline" id="deadline" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">Submit</button>
        </form>
    </div>

@endsection
