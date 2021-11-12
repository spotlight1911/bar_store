<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class SuperAdminController extends Controller
{
    public function indexUsers(){
        $users = User::all();
        return(view('admin.user', ['users'=>$users]));
    }
    public function adminTakeRightsUser(User $user){
        $user->is_admin = 0;
        $user->save();
        return $this->indexUsers();
    }
    public function adminGiveRightsUser(User $user){
        $user->is_admin = 1;
        $user->save();
        return $this->indexUsers();
    }
    public function deleteUser(User $user){
        $user->delete();
        return $this->indexUsers();
    }
}
