<?php

namespace Interfaces\Http\Controllers\Api\User;

use Domain\User\Entities\User;
use Interfaces\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        User::all();
        return response()->json([
            'data'=> User::all()
        ]);
    }
}
