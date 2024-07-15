@extends('layouts.master')

@section('content')
    <div class="bg-white p-4 rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-4">Edit Subscription</h1>
        <form action="{{ route('subscriptions.update', $subscription) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700">Name</label>
                <input type="text" name="name" value="{{ $subscription->name }}" class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Month</label>
                <input type="number" name="month" value="{{ $subscription->month }}" class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Weight Type</label>
                <input type="text" name="weight_type" value="{{ $subscription->weight_type }}" class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Image</label>
                <input type="file" name="image" class="w-full border-gray-300 rounded">
            </div>
            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update Subscription</button>
        </form>
    </div>
@endsection
