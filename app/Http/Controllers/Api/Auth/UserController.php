<?php
namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
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

