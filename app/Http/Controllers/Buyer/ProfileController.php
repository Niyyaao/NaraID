<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $buyer = Auth::guard('buyer')->user();
        return view('pages.buyer.profile.index', compact('buyer'));
    }

    public function save(Request $request)
    {
        $buyer = Auth::guard('buyer')->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:buyers,email,' . $buyer->id,
            'phone' => 'nullable|string|max:15',
            'password' => 'nullable|string|min:8|confirmed|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',
        ]);

        $buyer->name = $request->name;
        $buyer->email = $request->email;
        $buyer->phone = $request->phone;

        if ($request->filled('password')) {
            $buyer->password = bcrypt($request->password);
        }

        $buyer->save();

        return redirect()->route('buyer.profile')->with('success', 'Profile Updated Successfully');
    }
}
