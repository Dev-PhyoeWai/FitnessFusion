@extends('layouts.master')

@section('content')
    <div class="bg-white p-4 rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-4">Add Subscription</h1>
        <form action="{{ route('subscriptions.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Name</label>
                <input type="text" name="name" class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Month</label>
                <input type="number" name="month" class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Weight Type</label>
                <input type="text" name="weight_type" class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Image</label>
                <input type="file" name="image" class="w-full border-gray-300 rounded">
            </div>
            <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded">Add Subscription</button>
        </form>
    </div>
@endsection
