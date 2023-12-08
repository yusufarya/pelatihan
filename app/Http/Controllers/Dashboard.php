<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class Dashboard extends Controller
{
    
    public function __construct(protected Admin $admin) {
        $user = Auth::guard('admin')->user();
    }
    
    function index() {
        $cur_route = Route::current()->uri();
        $data = Auth::guard('admin')->user();
        return view('admin-page.dashboard', [
            'title' => 'Dashboard',
            'cur_page' => $cur_route,
            'auth_user' => $data,
            'calonPeserta' => DB::table('participants')->where('participant', '=', 'N')->count(),
            'peserta' => DB::table('participants')->where('participant', '=', 'Y')->count(),
            'pesertaApprove' => DB::table('registrants')->where('is_active', '=', 'Y')->count(),
            'pesertaDecline' => DB::table('registrants')->where('is_active', '=', 'N')->count(),
        ]);
    }
}
