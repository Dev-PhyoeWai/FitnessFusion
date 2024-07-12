@extends('layouts.master')

@section('content')
    <h1>Create Subscription</h1>
    <form action="{{ route('subscriptions.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label>User ID:</label>
            <input type="text" name="user_id" required>
        </div>
        <div>
            <label>Name:</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label>Month:</label>
            <input type="number" name="month" required>
        </div>
        <div>
            <label>Weight Type:</label>
            <input type="text" name="weight_type" required>
        </div>
        <div>
            <label>Image:</label>
            <input type="file" name="image">
        </div>
        <button type="submit">Create</button>
    </form>
@endsection
