@extends('layouts.master')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">Edit Workout Plan</h1>
        <form action="{{ route('workout_plans.update', $workoutPlan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="subscription_id" class="block text-gray-700 font-bold mb-2">Subscription ID:</label>
                <input type="text" id="subscription_id" name="subscription_id" value="{{ $workoutPlan->subscription_id }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
                <input type="text" id="name" name="name" value="{{ $workoutPlan->name }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="body_part" class="block text-gray-700 font-bold mb-2">Body Part:</label>
                <input type="text" id="body_part" name="body_part" value="{{ $workoutPlan->body_part }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="type" class="block text-gray-700 font-bold mb-2">Type:</label>
                <input type="text" id="type" name="type" value="{{ $workoutPlan->type }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="set" class="block text-gray-700 font-bold mb-2">Set:</label>
                <input type="number" id="set" name="set" value="{{ $workoutPlan->set }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="raps" class="block text-gray-700 font-bold mb-2">Raps:</label>
                <input type="number" id="raps" name="raps" value="{{ $workoutPlan->raps }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-bold mb-2">Image:</label>
                <input type="file" id="image" name="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="gender" class="block text-gray-700 font-bold mb-2">Gender:</label>
                <input type="text" id="gender" name="gender" value="{{ $workoutPlan->gender }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
        </form>
    </div>
@endsection

