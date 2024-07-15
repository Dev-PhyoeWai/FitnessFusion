@extends('layouts.master')

@section('content')
    <div class="bg-white p-4 rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-4">Add User</h1>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Name</label>
                <input type="text" name="name" class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Age</label>
                <input type="number" name="age" class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Height</label>
                <input type="number" name="height" class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Weight</label>
                <input type="number" name="weight" class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">BMI</label>
                <input type="number" step="0.1" name="BMI" class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Password</label>
                <input type="password" name="password" class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Subscription</label>
                <select name="subscription_id" class="w-full border-gray-300 rounded" required>
                    @foreach($subscriptions as $subscription)
                        <option value="{{ $subscription->id }}">{{ $subscription->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add User</button>
        </form>
    </div>
@endsection
