<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function usersWorkplace($id)
    {
        return User::where('workplace_id',$id)->first();
    }

    public function usersWorkplaceTotal($id)
    {
        return User::where('workplace_id',$id)->count();
    }
}
