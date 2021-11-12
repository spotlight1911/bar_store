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
    public function editIngredients(Ingridient $ingridient){
        return view('admin.edit', ['ingredient' => $ingridient,]);
    }
    public function adminRightsUser(User $user){
        $user->is_admin = 1;
        return $this->indexUsers();
    }
}
