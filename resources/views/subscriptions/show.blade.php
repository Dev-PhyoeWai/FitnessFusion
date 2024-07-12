@extends('layouts.master')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Subscription Details</h1>
        <table class="table-auto w-full border-collapse border border-gray-300">
            <tbody>
            <tr class="bg-gray-100">
                <td class="border border-gray-300 px-4 py-2 font-semibold">User ID</td>
                <td class="border border-gray-300 px-4 py-2">{{ $subscription->user_id }}</td>
            </tr>
            <tr>
                <td class="border border-gray-300 px-4 py-2 font-semibold">Name</td>
                <td class="border border-gray-300 px-4 py-2">{{ $subscription->name }}</td>
            </tr>
            <tr class="bg-gray-100">
                <td class="border border-gray-300 px-4 py-2 font-semibold">Month</td>
                <td class="border border-gray-300 px-4 py-2">{{ $subscription->month }}</td>
            </tr>
            <tr>
                <td class="border border-gray-300 px-4 py-2 font-semibold">Weight Type</td>
                <td class="border border-gray-300 px-4 py-2">{{ $subscription->weight_type }}</td>
            </tr>
            @if($subscription->image)
                <tr class="bg-gray-100">
                    <td class="border border-gray-300 px-4 py-2 font-semibold">Image</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <img src="{{ Storage::url($subscription->image) }}" alt="Subscription Image" class="w-24">
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
        <div class="mt-4">
            <a href="{{ route('subscriptions.edit', $subscription->id) }}" class="inline-block bg-blue-500 text-black py-2 px-4 rounded hover:bg-blue-600">Edit</a>
            <form action="{{ route('subscriptions.destroy', $subscription->id) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-black py-2 px-4 rounded hover:bg-red-600">Delete</button>
            </form>
            <a href="{{ route('subscriptions.index') }}" class="inline-block bg-gray-500 text-black py-2 px-4 rounded hover:bg-gray-600">Back to List</a>
        </div>
    </div>
@endsection
