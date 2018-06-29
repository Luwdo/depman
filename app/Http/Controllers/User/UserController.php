<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;

use Illuminate\Http\Request;

use App\Util\FlashMessage;

class UserController extends Controller
{
    protected $flashMessage;

    public function __construct(FlashMessage $flashMessage)
    {
        $this->flashMessage = $flashMessage;
        $this->middleware('auth');
    }


    public function index()
    {
        //$users = User::all()->except(Auth::id());
        $users = User::all();
        return view('users.view', ['users' => $users]);
    }

    public function getEditUser($id){
        $user = User::findOrFail($id);
        return view('users.edit', ['user' => $user]);
    }

    public function postEditUser($id, Request $request){

        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,id,'.$id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $validator->validate();

        $user = User::findOrFail($id);

        $user->name = $data['name'];
        $user->email = $data['email'];

        if($data['password']){
            $user->password = Hash::make($data['password']);
        }

        $user->save();

        $this->flashMessage->success('User Saved Successful');

        return back()->withInput();

        //return redirect()->route('edit_user', ['id' => $id]);
    }

    public function getCreateUser(Request $request){
        return view('users.create');
    }

    public function postCreateUser(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $validator->validate();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $this->flashMessage->success('User Creation Successful');

        return redirect()->route('users');
    }

    public function postDeleteUser($id, Request $request){

        User::destroy($id);

        $this->flashMessage->success('User Deleted Successful');

        return redirect()->route('users');
    }


}
