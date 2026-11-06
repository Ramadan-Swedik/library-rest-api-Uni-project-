<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Http\Requests\StaffStoreRequest;
use App\Http\Requests\StaffUpdateRequest;
use App\Http\Resources\StaffResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
        public function index()
    {
        return StaffResource::collection(Staff::all());
    }

    public function store(StaffStoreRequest $request)
    {
        $staff = Staff::create($request->validated());
        return StaffResource::make($staff);
    }

    public function show($id)
    {
        return StaffResource::make(Staff::findOrFail($id));
    }

    public function update(StaffUpdateRequest $request, $id)
    {
        $staff = Staff::findOrFail($id);
        $staff->update($request->validated());
        return StaffResource::make($staff);
    }

    public function destroy($id)
    {
        Staff::findOrFail($id)->delete();
        return response()->json("Staff member deleted successfully.");
    }

        public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        $staff = Staff::where('email', $request->email)->first();

        if (! $staff || ! Hash::check($request->password, $staff->password)) {
            return response()->json([
                'message' => 'Invalid credentials.'
            ], 401);
        }

        $token = $staff->createToken('staff-token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'token'   => $token,
            'staff'   => $staff
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out successfully.'
        ]);
    }
}
