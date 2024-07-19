<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\User;
use App\Models\Userlogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }
    public function create()
    {
        $subscriptions = Subscription::all();
        return view('users.create', compact('subscriptions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $subscriptions = Subscription::all();
        return view('users.edit', compact('user','subscriptions'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'age' => 'sometimes|integer',
            'height' => 'sometimes|integer',
            'weight' => 'sometimes|integer',
            'bmi' => 'sometimes|integer',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'subscription_id' => 'sometimes|exists:subscriptions,id',
        ]);

         if ($request->hasFile('image')) {

             if ($user->image && file_exists(public_path($user->image))) {
                 unlink(public_path($user->image));
             }

             $imageName = time().'.'.$request->image->extension();
             $request->image->move(public_path('uploads/profiles'), $imageName);
             $user->image = 'uploads/profiles/'.$imageName;
         }

        $user->update($request->except(['password', 'image']));
        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        if ($user->image) {
            Storage::delete($user->image);
        }
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    public function subscribe(Request $request, $userId)
    {
        $validator = Validator::make($request->all(), [
            'subscription_id' => 'required|exists:subscriptions,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

         $user= Auth::user();
//        $user = User::find($userId);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $subscription = Subscription::find($request->subscription_id);

        $user->subscription_id = $subscription->id;
        $user->save();

        // Log the subscription
        Userlogs::create([
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_email' => $user->email,
            'subscription_id' => $subscription->id,
            'subscription_name' => $subscription->name,
        ]);

        return response()->json(['success' => 'User subscribed successfully', 'user' => $user], 200);
    }
}
