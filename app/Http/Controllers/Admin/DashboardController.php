<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $usersCount = User::where('role_id', 2)->count();
        $booksCount = Book::count();
       
        return view('admin.dashboard', ['usersCount'=> $usersCount,'booksCount' => $booksCount]);
    }
}
