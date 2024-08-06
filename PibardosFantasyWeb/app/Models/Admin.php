<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;

    public static function createUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'username' => 'required|string|max:50',
                'name' => 'required|string|max:50',
                'surname' => 'nullable|string|max:50',
                'pfp' => 'nullable|mimes:jpeg,png,jpg,gif',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
                'biography' => 'nullable|string'
        ]);

       if ($validator->fails()) {
        return response()->json(['Error' => $validator->errors()], 422);
       }

       $user = User::create([
            'username' => $request->username,
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
       ]);

       if ($request->surname) {
        $user->surname = $request->surname;
       }

       if ($request->biography) {
        $user->biography = $request->biography;
       }

       if ($request->pfp) {
        $user->pfp = $request->pfp;
       }
       $user->save();

       return response()->json(
        [
        'Status' => 'Success',
        'User' => $user
        ],
        200
    );
    }
}
