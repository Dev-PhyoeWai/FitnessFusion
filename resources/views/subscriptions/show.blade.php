@extends('layouts.master')

@section('content')
    <div class="bg-white p-4 rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-4">{{ $subscription->name }}</h1>

        <table class="table-auto w-full">
            <tbody>
            <tr>
                <td class="border px-4 py-2"><strong>Month:</strong></td>
                <td class="border px-4 py-2">{{ $subscription->month }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2"><strong>Weight Type:</strong></td>
                <td class="border px-4 py-2">{{ $subscription->weight_type }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2"><strong>Image:</strong></td>
                <td class="border px-4 py-2"><img src="{{ $subscription->image }}" alt="{{ $subscription->name }}"></td>
            </tr>
            <tr>
                <td class="border px-4 py-2" colspan="2">
                    <a href="{{ route('subscriptions.edit', $subscription) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>

                    <form action="{{ route('subscriptions.destroy', $subscription) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded ml-2">Delete</button>
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
