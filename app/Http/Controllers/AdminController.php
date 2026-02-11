<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\UsersExport;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        $users = User::select('id', 'name', 'phone', 'email', 'created_at')
            ->where('role', 'user')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        $totalUsers = User::where('role', 'user')->count();

        $newUsersThisMonth = User::where('role', 'user')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();


        return view('dashboard', compact('users', 'totalUsers', 'newUsersThisMonth'));
    }


    public function exportExcel()
    {
        $export = new UsersExport();
        return $export->export();
    }
}
