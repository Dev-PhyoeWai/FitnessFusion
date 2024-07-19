@extends('layouts.master')
@section('content')
    <div class="container mt-5">
        <h2>Subscribe to a Subscription</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('/users/1/subscribe') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="subscription_id">Subscription ID</label>
                <input type="text" class="form-control" id="subscription_id" name="subscription_id" required>
            </div>
            <button type="submit" class="btn btn-primary">Subscribe</button>
        </form>
    </div>
@endsection
