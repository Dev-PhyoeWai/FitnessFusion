@extends('layouts.master')

@section('content')
    <div class="container mx-auto">
        <div class="flex flex-wrap">
            <div class="w-full">
                <div class="card mt-4 mb-4 p-4 shadow-lg rounded-lg">
                    <div class="card-header border-b border-gray-200 mb-4">
                        <h4 class="text-lg font-semibold flex justify-between items-center">
                            Update Workout Plan
                            <a href="{{ route('workout_plans.index') }}">
                                <button class="bg-red-500 text-black py-0.8 px-2 rounded-md hover:bg-gray-700
                                 transition duration-300" style="background: black;color: white;margin-bottom: 4px">
                                    Back
                                </button>
                            </a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('workout_plans.update', $workoutPlan) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Name</label>
                                <input type="text" name="name" value="{{ $workoutPlan->name }}"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md
                                  shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
                                   sm:text-sm" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Body Part</label>
                                <input type="text" name="body_part" value="{{ $workoutPlan->body_part }}"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md
                                  shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
                                   sm:text-sm" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Type</label>
                                <input type="text" name="type" value="{{ $workoutPlan->type }}"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md
                                  shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
                                   sm:text-sm" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Set</label>
                                <input type="number" name="set" value="{{ $workoutPlan->set }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md
                                  shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
                                   sm:text-sm" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Raps</label>
                                <input type="number" name="raps" value="{{ $workoutPlan->raps }}"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md
                                  shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
                                   sm:text-sm" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Image</label>
                                <input type="file" name="image"  class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md
                                  shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
                                   sm:text-sm" required >
                                @if($workoutPlan->image)
                                    <img src="{{ asset($workoutPlan->image) }}" alt="Current Image" width="45">
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Gender</label>
                                <select name="gender" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md
                                  shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
                                   sm:text-sm" required>
                                    <option value="Male" {{ $workoutPlan->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ $workoutPlan->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                    <option value="Other" {{ $workoutPlan->gender == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Subscription</label>
                                <select name="subscription_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md
                                  shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
                                   sm:text-sm" required>
                                    @foreach($subscriptions as $subscription)
                                        <option value="{{ $subscription->id }}" {{ $workoutPlan->subscription_id == $subscription->id ? 'selected' : '' }}>{{ $subscription->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="bg-amber-200 text-black py-0.8 px-2 rounded-md
                                hover:bg-info-dark transition duration-300" style="color:white;background: #0e7490">
                                    Update Workout Plan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
