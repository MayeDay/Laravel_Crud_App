<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    //

    public function getUser(){
      return response()->json(User::all(), 200);
    }
}
