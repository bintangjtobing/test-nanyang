<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class webController extends Controller
{
    public function index()
    {
        $getMember = DB::table('users')->where('idRelated', null)->orderBy('id', 'asc')->get();
        // Get JSON
        // return response($getMember, 200);
        return view('welcome', ['getMember' => $getMember]);
    }
    public function newMember(Request $req)
    {
        $newMember = new User();
        $newMember->name = $req->fullName;
        $newMember->address = $req->address;
        $newMember->phone_number = $req->phoneNumber;
        $newMember->idRelated = null;
        $newMember->save();
        return back()->with('success', 'Yeay! Your new member data has been recorded!');
        // return response($req->all());
    }
    public function deleteMember($id)
    {
        $getMember = DB::table('users')
            ->where('id', $id)
            ->delete();
        return back()->with('success', 'Your data and related data has been successfully deleted.');
    }
    public function getMember($id)
    {
        // Get the detail user
        $getMember = User::find($id);

        // get member that downline have upline
        $getAllMember = User::where('idRelated', $id)->get();

        // get member that downline have a downline
        $getUser = User::where('idUsersRelated', 'idRelated')->where('idRelated',$id)->get();

        if($getAllMember->count() >= 1){
            // return response($getAllMember);
            return view('edit', ['getMember' => $getMember, 'getAllMember' => $getAllMember]);
        }else if($getUser->count() >= 1){
            // return response($getUser);
            return view('edit', ['getMember' => $getMember, 'getUser' => $getUser]);
        }
        // return response($getMember);
        return view('edit', ['getMember' => $getMember, 'getAllMember' => $getAllMember, 'getUser'=>$getUser]);

    }
    public function newDownline(Request $req, $id)
    {
        $getMember = User::find($id);
        if ($getMember->idRelated != null) {
            $newMember = new User();
            $newMember->name = $req->fullName;
            $newMember->address = $req->address;
            $newMember->phone_number = $req->phoneNumber;
            $newMember->idRelated = $id;
            $newMember->idUsersRelated = $getMember->idRelated;
            $newMember->save();
            return back()->with('success', 'Yeay! Your new member of user data has been recorded!');
        } else {
            $newMember = new User();
            $newMember->name = $req->fullName;
            $newMember->address = $req->address;
            $newMember->phone_number = $req->phoneNumber;
            $newMember->idRelated = $id;
            $newMember->save();
            return back()->with('success', 'Yeay! Your new member of user data has been recorded!');
        }
        // return response($req->all());
    }
    public function search(Request $request)
    {
        $keyword = $request->search;
        $getMember = User::where('name', 'like', "%" . $keyword . "%")
        ->OrWhere('address', 'like', "%" . $keyword . "%")
        ->OrWhere('phone_number', 'like', "%" . $keyword . "%")->get();
        return view('welcome', ['getMember'=>$getMember])->with('i', (request()->input('page', 1) - 1) * 5);
        // return response($users);
    }
}
