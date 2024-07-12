@extends('layouts.master')

@section('content')
    <h1>Edit Meal Plan</h1>
    <form action="{{ route('meal_plans.update', $mealPlan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label>Subscription ID:</label>
            <input type="text" name="subscription_id" value="{{ $mealPlan->subscription_id }}" required>
        </div>
        <div>
            <label>Ingredient:</label>
            <input type="text" name="ingredient" value="{{ $mealPlan->ingredient }}" required>
        </div>
        <div>
            <label>Calories:</label>
            <input type="number" name="calories" value="{{ $mealPlan->calories }}" required>
        </div>
        <div>
            <label>Type:</label>
            <input type="text" name="type" value="{{ $mealPlan->type }}" required>
        </div>
        <div>
            <label>Image:</label>
            <input type="file" name="image">
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
