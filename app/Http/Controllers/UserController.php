<?php
//
//namespace App\Http\Controllers;
//
//use App\Models\Subscription;
//use App\Models\User;
//use Illuminate\Http\Request;
//
//class UserController extends Controller
//{
//    public function index()
//    {
//        $users = User::all();
//        return view('users.index', compact('users'));
//    }
//    public function create()
//    {
//        $subscriptions = Subscription::all();
//        return view('users.create', compact('subscriptions'));
//    }
//
//    public function store(Request $request)
//    {
//        User::create($request->all());
//        return redirect()->route('users.index');
//    }
//
//    public function show(User $user)
//    {
//        return view('users.show', compact('user'));
//    }
//
//    public function edit(User $user)
//    {
//        $subscriptions = Subscription::all();
//        return view('users.edit', compact('user',
//            'subscriptions'));
//    }
//
//    public function update(Request $request, User $user)
//    {
//        $user->update($request->all());
//        return redirect()->route('users.index');
//    }
//
//    public function destroy(User $user)
//    {
//        $user->delete();
//        return redirect()->route('users.index');
//    }
//}

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json([
            'success' => true,
            'data' => $users
        ], 200);
    }

    public function create()
    {
        $subscriptions = Subscription::all();
        return response()->json([
            'success' => true,
            'data' => $subscriptions
        ], 200);
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        return response()->json([
            'success' => true,
            'data' => $user
        ], 201);
    }

    public function show(User $user)
    {
        return response()->json([
            'success' => true,
            'data' => $user
        ], 200);
    }

    public function edit(User $user)
    {
        $subscriptions = Subscription::all();
        return response()->json([
            'success' => true,
            'data' => [
                'user' => $user,
                'subscriptions' => $subscriptions
            ]
        ], 200);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return response()->json([
            'success' => true,
            'data' => $user
        ], 200);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            'success' => true,
            'message' => 'User deleted successfully'
        ], 200);
    }
}

