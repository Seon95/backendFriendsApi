<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Friend;

class FriendsController extends Controller
{
    public function index()
    {
        return Friend::all();
    }

    public function store(Request $request)
    {
        $friend = new Friend();

        $friend->name = $request->input('name');
        $friend->last_name = $request->input('last_name');
        $friend->age = $request->input('age');

        $friend->save();

        return response()->json(['message' => 'Friend created successfully'], 201);
    }

    public function update(Request $request, $id)
    {
        $friend = Friend::find($id);

        if (!$friend) {
            return response()->json(['message' => 'Friend not found'], 404);
        }

        $friend->name = $request->input('name');
        $friend->last_name = $request->input('last_name');
        $friend->age = $request->input('age');

        $friend->save();

        return response()->json(['message' => 'Friend updated successfully'], 200);
    }

    public function destroy($id)
    {
        $friend = Friend::find($id);

        if (!$friend) {
            return response()->json(['message' => 'Friend not found'], 404);
        }

        $friend->delete();

        return response()->json(['message' => 'Friend deleted successfully'], 200);
    }
    public function show($id)
    {
        $friend = Friend::find($id);

        if (!$friend) {
            return response()->json(['message' => 'Friend not found'], 404);
        }

        return $friend;
    }
}
