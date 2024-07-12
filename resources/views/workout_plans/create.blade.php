@extends('layouts.master')

@section('content')
    <h1>Create Workout Plan</h1>
    <form action="{{ route('workout_plans.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Subscription:</label>
            <select name="subscription_id" required>
                @foreach($subscriptions as $subscription)
                    <option value="{{ $subscription->id }}">{{ $subscription->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Name:</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label>Body Part:</label>
            <input type="text" name="body_part" required>
        </div>
        <div>
            <label>Type:</label>
            <input type="text" name="type" required>
        </div>
        <div>
            <label>Set:</label>
            <input type="number" name="set" required>
        </div>
        <div>
            <label>Raps:</label>
            <input type="number" name="raps" required>
        </div>
        <div>
            <label>Image:</label>
            <input type="file" name="image" required>
        </div>
        <div>
            <label>Gender:</label>
            <input type="text" name="gender" required>
        </div>
        <button type="submit">Create</button>
    </form>
@endsection
