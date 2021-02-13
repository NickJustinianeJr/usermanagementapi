<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

class UsersController extends Controller
{
    //

    public function list() {

        return \App\Models\Users::all();
    }

    public function createUser(Request $request) {
        $user = new \App\Models\Users;
        $user->id =  $request->id;
        $user->userName = $request->userName;
        $user->passwordHash = $request->passwordHash;
        $user->emailAddress = $request->emailAddress;
        $user->save();
  
        return response()->json([
          "message" => "User created"
        ], 201);
      }

      public function getUser($id) {
        if (\App\Models\Users::where('id', $id)->exists()) {
          $user = \App\Models\Users::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);

          return response($user, 200);
        } else {

          return response()->json([
            "message" => "Book not found"
          ], 404);
        }
      }

      public function updateUser(Request $request, $id) {
        if (\App\Models\Users::where('id', $id)->exists()) {
          $user = \App\Models\Users::find($id);
  
          $user->id = $request->id;
          $user->userName = $request->userName;
          $user->passwordHash = $request->passwordHash;
          $user->emailAddress = $request->emailAddress;
          $user->save();
  
          return response()->json([
            "message" => "user updated successfully"
          ], 200);
        } else {
          return response()->json([
            "message" => "user not found"
          ], 404);
        }
      }

      public function deleteUser ($id) {
        if(\App\Models\Users::where('id', $id)->exists()) {
          $user = \App\Models\Users::find($id);
          $user->delete();
  
          return response()->json([
            "message" => "user deleted"
          ], 202);
        } else {
          return response()->json([
            "message" => "User not found"
          ], 404);
        }
      }

}
