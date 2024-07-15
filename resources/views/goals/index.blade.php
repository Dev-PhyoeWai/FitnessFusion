@extends('layouts.master')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4"> Activity</h1>
        <a href="{{ route('goal.create') }}" class="bg-blue-500 text-blue-400 px-4 py-2 rounded hover:bg-blue-700 transition duration-300">Add New </a>
        @if (session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded mt-4">
                {{ session('success') }}
            </div>
        @endif
       

        @if ($goals->isEmpty())
  <div class="alert alert-info">No goals recorded yet.</div>
@else
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Type</th>
        <th>Tatget Value</th>
        <th>Progress</th>
        <th>Deadline</th>
        <th>Actions</th> </tr>
    </thead>
    <tbody>
      @foreach ($goals as $goal)
        <tr>
          <td>{{ $goal->type }}</td>
          <td>{{ $goal->targetvalue }}</td> 
           <td>{{ $goal->progress}}</td> 
          <td>{{ $goal->date }}</td>
          <td class="py-2 px-4 border-b">
            <a href="{{ route('goal.edit', $goal->id) }}" class="bg-yellow-500 text-black px-4 py-2 rounded hover:bg-yellow-700 transition duration-300">Edit</a>
                <form action="{{ route('goal.destroy', $goal) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-black px-4 py-2 rounded hover:bg-red-700 transition duration-300">Delete</button>
                </form>
            </td>
         </tr>
      @endforeach
    </tbody>
  </table>
@endif

    </div>

@endsection
