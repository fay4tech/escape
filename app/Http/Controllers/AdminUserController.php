<?php
/**
 * Copyright  Faycal.(c) 2018.
 */

namespace App\Http\Controllers;

use App\Company;
use App\Room;
use App\User;
use App\Traits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Sitemap\SitemapGenerator;

class AdminUserController extends Controller
{
    use Traits\ShortNumber;
    
    /**
     * return active and no-active users separate,
     * return companies name and id to display the name of the company matching with company_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index(){
        if (Auth::check() && Auth::user()->lvl == 10){
                $news = User::with('company')->where('active', '=', 0)->orderBy('active')->get();
                $users = User::with('company')->where('active', '=', 1)->orderByDesc('lvl')->get();
                $companies = Company::all()->pluck('name','id');
                $countAll = $this->allCount();
                $sumView = Room::sum('views');
            return view('admin.index', compact('users', 'news', 'companies', 'countAll','sumView'));
        }else {
            return redirect('rooms')->with('error','You are not super admin');
        }
    }

    /**
     * Change active status of user ( activate / deactivate )
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function activate(Request $request)
    {
        if (Auth::check() && Auth::user()->lvl == 10){
            $user = User::where('id', $request->id)->first();
            if ($user->active == '0' ){
                $user->update(['active' => 1]);
                return redirect('admin')->with('success','User is Activate now');
            }else{
                $user->update(['active' => 0]);
                return redirect('admin')->with('success','User is Deactivate now');
            }
        }else {
            return redirect('rooms')->with('error','You are not super admin');
        }
    }

    /**
     * Save the new user (Admin Add)
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if (Auth::check() && Auth::user()->lvl == 10) {
            if (User::where('email', '=', $request->email)->exists()) {
                return  redirect('admin')->with('error',"This E-mail $request->email Exist");
            }
            if (($request->password != $request->confirm_password)) {
                return redirect('admin')->with('error','not same password')->withInput($request->except('password', 'confirm_password'));
            }
            if (strlen($request->password) < 5){
                return redirect('admin')->with('error','The password must contain at least 6 characters ')->withInput($request->except('password', 'confirm_password'));
            }
            $request->password = Hash::make($request->password);
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->company_id = $request->company_id;
            $user->lvl = $request->lvl;
            $user->save();
            return redirect('admin')->with('success','You have Add new User');
        } else {
            return redirect('rooms')->with('error','You are not super admin');
        }
    }

    public function allCount(){

      $countAll['room'] = Room::count();
      $countAll['company'] = Company::count() - 1;
      $countAll['user'] = User::count();
      $countAll['roomVue'] = Room::where('activ', '=', '1')->count();
      $countAll['roomNoVue'] = Room::where('activ', '=', '0')->count();
      $countAll['roomVueFormat'] = $this->ShortNumberFormat(Room::sum('views'));
      return $countAll;
    }

    public function siteMap(){
        SitemapGenerator::create('https://serial-escapers.com')->writeToFile('sitemap.xml');
        
        return redirect('admin')->with('success','Sitemap UpLoad!!');
    }
}
