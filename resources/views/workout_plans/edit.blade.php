@extends('layouts.master')

@section('content')
    <div class="bg-white p-4 rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-4">Edit Workout Plan</h1>
        <form action="{{ route('workout_plans.update', $workoutPlan) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700">Name</label>
                <input type="text" name="name" value="{{ $workoutPlan->name }}" class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Body Part</label>
                <input type="text" name="body_part" value="{{ $workoutPlan->body_part }}" class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Type</label>
                <input type="text" name="type" value="{{ $workoutPlan->type }}" class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Set</label>
                <input type="number" name="set" value="{{ $workoutPlan->set }}" class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Raps</label>
                <input type="number" name="raps" value="{{ $workoutPlan->raps }}" class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Image</label>
                <input type="file" name="image"  class="w-full border-gray-300 rounded">
                @if($workoutPlan->image)
                <img src="{{ asset($workoutPlan->image) }}" alt="Current Image" width="100">
            @endif
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Gender</label>
                <select name="gender" class="w-full border-gray-300 rounded" required>
                    <option value="Male" {{ $workoutPlan->gender == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ $workoutPlan->gender == 'Female' ? 'selected' : '' }}>Female</option>
                    <option value="Other" {{ $workoutPlan->gender == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Subscription</label>
                <select name="subscription_id" class="w-full border-gray-300 rounded" required>
                    @foreach($subscriptions as $subscription)
                        <option value="{{ $subscription->id }}" {{ $workoutPlan->subscription_id == $subscription->id ? 'selected' : '' }}>{{ $subscription->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update Workout Plan</button>
        </form>
    </div>
@endsection
