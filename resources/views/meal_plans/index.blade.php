{{--@extends('layouts.master')--}}

{{--@section('content')--}}
{{--    <div class="bg-white p-4 rounded-lg shadow">--}}
{{--        <div class="flex justify-between items-center mb-4">--}}
{{--            <h1 class="text-2xl font-bold">Meal Plans</h1>--}}
{{--            <a href="{{ route('meal_plans.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Workout Plan</a>--}}
{{--        </div>--}}
{{--        <table class="min-w-full bg-white">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th class="py-2">ID</th>--}}
{{--                <th class="py-2">Name</th>--}}
{{--                <th class="py-2">Ingredient</th>--}}
{{--                <th class="py-2">Type</th>--}}
{{--                <th class="py-2">Image</th>--}}
{{--                <th class="py-2">Calories</th>--}}
{{--                <th class="py-2">Actions</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach ($mealPlans as $mealPlan)--}}
{{--                <tr>--}}
{{--                    <td class="py-2">{{ $mealPlan->id }}</td>--}}
{{--                    <td class="py-2">{{ $mealPlan->name }}</td>--}}
{{--                    <td class="py-2">{{ $mealPlan->ingredient }}</td>--}}
{{--                    <td class="py-2">{{ $mealPlan->type }}</td>--}}
{{--                    <td class="py-2">--}}
{{--                        @if($mealPlan->image)--}}
{{--                            <img src="{{ asset($mealPlan->image) }}" alt="Current Image" width="100">--}}
{{--                        @endif--}}
{{--                    </td>--}}
{{--                    <td class="py-2">{{ $mealPlan->calories }}</td>--}}
{{--                    <td class="py-2">--}}
{{--                        <a href="{{ route('meal_plans.show', $mealPlan) }}" class="text-blue-500">View</a>--}}
{{--                        <a href="{{ route('meal_plans.edit', $mealPlan) }}" class="text-yellow-500 mx-2">Edit</a>--}}
{{--                        <form action="{{ route('meal_plans.destroy', $mealPlan) }}" method="POST" class="inline">--}}
{{--                            @csrf--}}
{{--                            @method('DELETE')--}}
{{--                            <button type="submit" class="text-red-500">Delete</button>--}}
{{--                        </form>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    </div>--}}
{{--@endsection--}}

@extends('layouts.master')

@section('content')
    @if(session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-4 rounded relative"
             role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card mt-4 mb-4 p-4 shadow-lg rounded-lg">
        <div class="card-header border-b border-gray-200 mb-4">
            <h4 class="text-lg font-semibold flex justify-between items-center">
                Workout Plans
                <a href="{{ route('meal_plans.create') }}">
                    <button class="bg-red-500 text-black py-0.8 px-2 rounded-md hover:bg-gray-700
                                 transition duration-300" style="background: #0e7490; color: white;margin-bottom: 4px">
                        Add Meal Plan
                    </button>
                </a>
            </h4>
        </div>
        <div class="card-body">
            <!-- Card body content -->
            <div class="overflow-x-auto">
                <table id="workoutPlansTable" class="min-w-full bg-white border border-gray-200">
                    <thead>
                    <tr class="w-full bg-gray-200 text-left">
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">Name</th>
                        <th class="py-2 px-4 border-b">Ingredient</th>
                        <th class="py-2 px-4 border-b">Type</th>
                        <th class="py-2 px-4 border-b">Image</th>
                        <th class="py-2 px-4 border-b">Calories</th>
                        <th class="py-2 px-4 border-b">Subscription</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                    </thead>
                    <tbody id="workoutPlansTableBody">
                    @foreach ($mealPlans as $mealPlan)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $mealPlan->id }}</td>
                            <td class="py-2 px-2 border-b">{{ $mealPlan->name }}</td>
                            <td class="py-2 px-3 border-b">{{ $mealPlan->ingredient }}</td>
                            <td class="py-2 px-4 border-b">{{ $mealPlan->type }}</td>
                            <td class="py-2 px-4 border-b">
                                @if($mealPlan->image)
                                    <img src="{{ asset($mealPlan->image) }}" alt="Current Image" width="45">
                                @endif
                            </td>
                            <td class="py-2 px-4 border-b">{{ $mealPlan->calories }}</td>
                            <td class="py-2 px-4 border-b">{{ $mealPlan->subscription->name }}</td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('meal_plans.edit', $mealPlan) }}" style="color: darkorange" class="text-yellow-500 mx-2 hover:underline">Edit</a>
                                <span> | </span>
                                <form action="{{ route('meal_plans.destroy', $mealPlan) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline" style="color: red">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="flex justify-between items-center mt-4">
                    <button id="prevPageBtn" style="color: #0e7490; text-decoration: underline" class="bg-gray-500 text-white py-2 px-4 rounded disabled:opacity-50" onclick="prevPage()">Previous</button>
                    <div id="pageInfo" class="text-gray-700"></div>
                    <button id="nextPageBtn" style="color: #0e7490; text-decoration: underline" class="bg-gray-500 text-white py-2 px-4 rounded disabled:opacity-50" onclick="nextPage()">Next</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const rowsPerPage = 5;
        let currentPage = 1;
        const tableBody = document.getElementById('workoutPlansTableBody');
        const totalRows = tableBody.getElementsByTagName('tr').length;

        function renderTablePage() {
            const start = (currentPage - 1) * rowsPerPage;
            const end = start + rowsPerPage;
            const rows = tableBody.getElementsByTagName('tr');

            for (let i = 0; i < rows.length; i++) {
                if (i >= start && i < end) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }

            document.getElementById('pageInfo').innerText = `Page ${currentPage} of ${Math.ceil(totalRows / rowsPerPage)}`;
            document.getElementById('prevPageBtn').disabled = currentPage === 1;
            document.getElementById('nextPageBtn').disabled = currentPage === Math.ceil(totalRows / rowsPerPage);
        }

        function prevPage() {
            if (currentPage > 1) {
                currentPage--;
                renderTablePage();
            }
        }

        function nextPage() {
            if (currentPage < Math.ceil(totalRows / rowsPerPage)) {
                currentPage++;
                renderTablePage();
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            renderTablePage();
        });
    </script>
@endsection
