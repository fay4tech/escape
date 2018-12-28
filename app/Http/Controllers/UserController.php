<?php
/**
 * Copyright (c) 2018.
 */

namespace App\Http\Controllers;


use App\Company;
use App\Forms\UserForm;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DateTime;
use Illuminate\Support\Facades\Storage;
use Kris\LaravelFormBuilder\FormBuilder;

class UserController extends Controller
{
    /**
     * @var FormBuilder
     */
    private $formBuilder;

    /**
     * UserController constructor.
     * @param FormBuilder $formBuilder
     */
    public function __construct(FormBuilder $formBuilder)
    {
        $this->formBuilder = $formBuilder;
        $this->middleware('auth');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index()
    {
        if (Auth::check()) {
            $company = Company::where('id', Auth::user()->company_id)->first();
            return view('users.index', compact('company'));
        }else{
            return redirect('users')->with('error','You need to be login');
        }
    }

    /**
     * @param $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show($user){
        if($user == Auth::user()->id || Auth::user()->lvl > 8) {
            $users = User::where('id', $user)->first();
            $company = Company::where('id', $users->company_id)->first();
            return view('users.show', compact('users', 'company'));
        }
        return redirect('rooms')->with('error', 'Is not your Profile');
    }


    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        if (Auth::id() == $user->id || Auth::user()->lvl > 8){
            foreach (Storage::files('users') as $value){
                $avatars [] = $value;
            }
            $form = $this->getForm($user);
            return view('users.edit', compact('user', 'form','avatars'));
        }else {
            return redirect('rooms')->with('error','You are not super admin');
        }

    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(User $user)
    {
        if(Auth::user()->email == request('email') || Auth::user()->lvl == 10) {
            $form = $this->getForm($user);
            $form->remove('password')->remove('avatar')->remove('active'); // to not replace withe null after redirectIfNotValid
            $form->redirectIfNotValid();
            $user->updated_at = new Datetime('Europe/Paris');
            $user->avatar = \request('avatar');
            $user->save();
                return redirect()->route('users.show', $user)->with('success','Your profile is Updated');
        }else {
            return redirect('rooms')->with('error','You are not super admin');
        }
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showChangePasswordForm(){
        return view('users.changepassword');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function changePassword(Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
        $validatedData  = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
            //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        $request->session()->keep('error');
        return redirect()->route('users.index')->with("success","Password changed successfully !");
    }


    /**
     * @param User|null $user
     * @return \Kris\LaravelFormBuilder\Form
     */
    private function getForm(?User $user = null)
    {
        $user = $user ?: new User();
        return $this->formBuilder->create(UserForm::class, [
            'model' => $user
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if (Auth::check() && Auth::user()->lvl > 8){
            $passport = User::find($id);
            $passport->delete();
            return redirect('admin')->with('success','User has been  deleted');
        }else{
            return redirect('rooms')->with('error','You are not Super Admin');
        }
    }
}
