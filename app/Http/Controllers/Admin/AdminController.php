<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use Auth;
use App\Models\MasterAdmin;

class AdminController extends Controller
{
    // use AuthenticatesUsers;
    public function index()
    {
        $page_title = 'Login';
        $page_description = 'login page';
        $checklogin = route('checklogin');
        
        return view('admin.login', compact('page_title', 'page_description', 'checklogin'));
    }
    
    public function adminLogin(Request $request)
    {
        // dd($request->all());
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $adminUser = MasterAdmin::where('email',$request->email)->first();
        
        if ($adminUser) {
            if (\Hash::check($request->password, $adminUser->password)) {
                Auth::login($adminUser);
                return redirect('admin/dashboard');
            }else{
                return redirect()->back()->with('error', 'Password Are Wrong!');
            }
        } else {
            return redirect()->back()->with('error', 'Email-Address Are Wrong!');
        }
    }
    
    public function adminLogout()
    {   
        Auth::logout();
        
        return redirect('/admin');
    }

    public function dashboard()
    {
        $page_title = 'Dashboard';
        $page_description = 'Some description for the page';
        
        return view('admin.pages.dashboard', compact('page_title', 'page_description'));
    }
}
