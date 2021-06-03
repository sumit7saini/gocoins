<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\UserCoins;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function isAdministrator() {
        return $this->roles()->where('name', 'Administrator')->exists();
    }

    function getUsers(Request $request) {
        $users = User::select('id', 'name', 'email', 'userMobile')->paginate(10);
        return view('adminGetUsers', ['users' => $users]);
    }

    function searchUsers(Request $request) {
        $user = User::where ( 'name', 'LIKE', '%' . $request->q . '%' )
        ->orWhere ( 'email', 'LIKE', '%' . $request->q . '%' )
        ->orWhere ( 'userMobile', 'LIKE', '%' . $request->q . '%' )
        ->paginate (5);
        return view('adminGetUsers', ['users' => $user]);

    }

    function getUser(Request $request, $user_id){
        $user = User::where ( 'id', '=', $user_id)->get();
        return view('user', ['user' => $user]);
    }

    function addCoins(Request $request){
        $usercoins = UserCoins::where('user_id', '=', $request->custId);

        if ($usercoins->first() == null) {
            UserCoins::create(['user_id' => $request->custId, 'coins' => $request->q, 'type' => 'purchase']);
        } else {
            $usercoins->update(['coins' => DB::raw('coins +'.$request->q)]);
        }
        return redirect()->back()->with('message', 'Hey! '.$request->q.' Coins inserted successfully');
    }

    public function index()
    {
        $users = User::select()->get();
        return view('user.index', ['users' => $users]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        print json_encode($request);
        die();
        
        $request->validate([
            'name'=>'required',
            'password'=>'required',
            //'rollId'=>'required',
            'userStatus'=>'required',
            'email'=>'required',
            'userMobile'=>'required'
        ]);

        $vendor = new User([
            'name' => $request->get('name'),
            'password' => $request->get('password'),
            'rollId' => $request->get('rollId'),
            'userStatus' => $request->get('userStatus'),
            'email' => $request->get('email'),
            'userMobile' => $request->get('userMobile'),
        ]);
        $vendor->save();
        return redirect('/users')->with('success', 'User saved!');
        // $vendors = Vendor::select()->get();
        // return view('vendor.index', ['vendors' => $vendors]);
    }

    public function edit(Request $request, $id)
    {
        $vendor = User::where('id', $id)->get();
        return view('user.edit', ['user' => $user]);        
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'password'=>'required',
            'rollId'=>'required',
            'userStatus'=>'required',
            'email'=>'required',
            'userMobile'=>'required'
        ]);

        $contact = User::where('id', $id)->update([
            'name' => $request->get('name'),
            'password' => $request->get('password'),
            'rollId' => $request->get('rollId'),
            'userStatus' => $request->get('userStatus'),
            'email' => $request->get('email'),
            'userMobile' => $request->get('userMobile'),
        ]);

        return redirect('/users')->with('success', 'Vendor updated!');
    }


}
