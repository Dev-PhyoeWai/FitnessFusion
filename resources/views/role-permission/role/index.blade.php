@extends('layouts.master')
@section('title','Permission Page')
@section('content')

    @include('role-permission.nav-links')

    <div class="container mx-auto">
        <div class="flex flex-wrap">
            <div class="w-full">

                @if(session('status'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                         role="alert">
                        {{ session('status') }}
                    </div>

                @endif
                <div class="card mt-4 mb-4 p-4 shadow-lg rounded-lg">
                    <div class="card-header border-b border-gray-200 mb-4">
                        <h4 class="text-lg font-semibold flex justify-between items-center">
                            Roles
                            <a href="{{ route('roles.create') }}">
                                <button class="bg-red-500 text-black py-1 px-2 rounded-md hover:bg-gray-700
                                 transition duration-300">
                                    Add Role
                                </button>
                            </a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <!-- Card body content -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($roles as $role)
                                    <tr>
                                        <td class="py-2 px-4 border-b">{{$role->id}}</td>
                                        <td class="py-2 px-4 border-b">{{$role->name}}</td>
                                        <td class="py-2 px-4 border-b">
                                            <a href="{{ url('roles/'.$role->id.'/give-permissions') }}"
                                               class="inline-block bg-green-500 text-green-700 py-1 px-3
                                                rounded-md hover:bg-green-600 transition duration-300">
                                                Add / Edit Role Permission
                                            </a>
                                            <span>  | </span>
                                            <a href="{{ url('roles/'.$role->id.'/edit') }}"
                                               class="inline-block bg-green-500 text-green-700 py-1 px-3
                                                rounded-md hover:bg-green-600 transition duration-300">
                                                Edit
                                            </a>
                                            <span>|</span>
                                            <a href="{{ url('roles/'.$role->id.'/delete') }}"
                                               class="inline-block bg-red-500 text-black py-1 px-3
                                                rounded-md hover:bg-red-600 transition duration-300">
                                                Delete
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                                <!-- Additional rows as needed -->
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

{{--    data table --}}
    <div class="container mx-auto mt-10">
        <h2 class="text-2xl font-semibold mb-6">Fitness Fusion Data Table</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                <tr class="w-full bg-gray-200 text-left">
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Workout Plan</th>
                    <th class="py-2 px-4 border-b">Meal Plan</th>
                    <th class="py-2 px-4 border-b">Progress</th>
                </tr>
                </thead>
                <tbody>
                <tr class="bg-gray-100">
                    <td class="py-2 px-4 border-b">1</td>
                    <td class="py-2 px-4 border-b">John Doe</td>
                    <td class="py-2 px-4 border-b">Full Body Workout</td>
                    <td class="py-2 px-4 border-b">High Protein Diet</td>
                    <td class="py-2 px-4 border-b">75%</td>
                </tr>
                <tr class="bg-white">
                    <td class="py-2 px-4 border-b">2</td>
                    <td class="py-2 px-4 border-b">Jane Smith</td>
                    <td class="py-2 px-4 border-b">Cardio Blast</td>
                    <td class="py-2 px-4 border-b">Keto Diet</td>
                    <td class="py-2 px-4 border-b">60%</td>
                </tr>
                <tr class="bg-gray-100">
                    <td class="py-2 px-4 border-b">3</td>
                    <td class="py-2 px-4 border-b">Alex Johnson</td>
                    <td class="py-2 px-4 border-b">Strength Training</td>
                    <td class="py-2 px-4 border-b">Balanced Diet</td>
                    <td class="py-2 px-4 border-b">80%</td>
                </tr>
                <tr class="bg-white">
                    <td class="py-2 px-4 border-b">4</td>
                    <td class="py-2 px-4 border-b">Emily Davis</td>
                    <td class="py-2 px-4 border-b">Yoga and Flexibility</td>
                    <td class="py-2 px-4 border-b">Vegan Diet</td>
                    <td class="py-2 px-4 border-b">90%</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

{{--    data table      --}}
<body class="bg-gray-100 text-gray-900 tracking-wider leading-normal">
    <!--Container-->
    <div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2">
        <!--Title-->
        <h1 class="flex items-center font-sans font-bold break-normal text-indigo-500 px-2 py-8 text-xl md:text-2xl">
            Responsive <a class="underline mx-2" href="https://datatables.net/">DataTables.net</a> Table
        </h1>
        <!--Card-->
        <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">

            <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                <tr>
                    <th data-priority="1">Name</th>
                    <th data-priority="2">Position</th>
                    <th data-priority="3">Office</th>
                    <th data-priority="4">Age</th>
                    <th data-priority="5">Start date</th>
                    <th data-priority="6">Salary</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>$320,800</td>
                </tr>

                <!-- Rest of your data (refer to https://datatables.net/examples/server_side/ for server side processing)-->

                <tr>
                    <td>Donna Snider</td>
                    <td>Customer Support</td>
                    <td>New York</td>
                    <td>27</td>
                    <td>2011/01/25</td>
                    <td>$112,000</td>
                </tr>
                </tbody>

            </table>
        </div>
        <!--/Card-->
    </div>
    <!--/container-->
 <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!--Datatables -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {

            var table = $('#example').DataTable({
                responsive: true
            })
                .columns.adjust()
                .responsive.recalc();
        });
    </script>
</body>
@endsection
