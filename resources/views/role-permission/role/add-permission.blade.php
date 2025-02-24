@extends('layouts.master')
@section('title','Permission Page')
@section('content')
    <div class="container mx-auto">
        <div class="flex flex-wrap">
            <div class="w-full">
                @if(session('status'))
                    <div class="bg-green-100 border border-green-400 text-green-700 py-4 px-4 rounded relative"
                         role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card mt-4 mb-4 p-4 shadow-lg rounded-lg">
                    <div class="card-header border-b border-gray-200 mb-4">
                        <h4 class="text-lg font-semibold flex justify-between items-center">
                            Role : {{$role->name}}
                            <a href="{{ url('roles') }}">
                                <button class="bg-red-500 text-black py-0.8 px-2 rounded-md hover:bg-gray-700
                                 transition duration-300" style="background: black;color: white;margin-bottom: 4px">
                                    Back
                                </button>
                            </a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <!-- Card body content -->
                        <form action="{{ url('roles/'.$role->id.'/give-permissions') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="permission_name"
                                       class="block text-sm font-medium text-gray-700">Permissions</label><hr/><br/><br/>
                                <div class="flex flex-wrap">
                                    @foreach($permissions as $permission)
                                        <div class="w-full md:w-1/4">
                                            <label>
                                                <input type="checkbox" name="permission[]"
                                                       id="permission_name" value="{{$permission->name}}"
                                                       {{in_array($permission->id,$rolePermissions)?'checked':''}}
                                                />
                                                {{$permission->name}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="bg-info text-black py-0.8 px-2 rounded-md
                                hover:bg-info-dark transition duration-300" style="color:white;background: #0e7490">
                                    Update
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
