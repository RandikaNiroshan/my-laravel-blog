<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('show');
    }



    public function index()
    {

    }

    public function show($id)
    {
        $user = User::with('comments', 'posts')->findOrFail($id);
        return view('user.profile', compact('user'));
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
