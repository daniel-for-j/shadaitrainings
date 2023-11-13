<?php


namespace App\Http\Controllers;

use App\Models\CustomUser;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminIndex()
    {
        $users = CustomUser::all();
        $totalUsers = $users->count();

        return view('admin.index', compact('users', 'totalUsers'));
    }

    public function createUser(Request $request)
    {
        // Simplified user creation logic
        User::create($request->all());

        return redirect()->route('admin.index')->with('success', 'User created successfully');
    }
}
