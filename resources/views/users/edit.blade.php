@extends('layouts.master')

@section('content')
    <div class="bg-white p-4 rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-4">Add User</h1>
        <form action="{{ route('users.store',$user)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700">Name</label>
                <input type="text" name="name" value="{{ $user->name }}" class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email"  value="{{ $user->email }}" class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Age</label>
                <input type="number" name="age"  value="{{ $user->age }}" class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Height</label>
                <input type="number" name="height" readonly value="{{ $user->height }}" class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Weight</label>
                <input type="number" name="weight"  value="{{ $user->weight }}" class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">BMI</label>
                <input type="number" step="0.1" name="BMI"  value="{{ $user->bmi }}" class="w-full border-gray-300 rounded" required>
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
            <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded">Add User</button>
        </form>
    </div>
@endsection
