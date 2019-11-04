<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class Pagination extends Controller
{
    public function users(){
        if(ISSET($_GET['search'])){
            $search =explode(" ",$_GET['search']);
            foreach($search as $search)
            $users = User::where('firstname', 'like', "%".$search."%")
                ->orwhere('secondname', 'like', "%".$search."%")
                ->orwhere('groupid', 'like', "%".$search."%")
                ->orwhere('ege', 'like', "%".$search."%")
                ->paginate(5);
        }
        else
            $users=User::paginate(5);
        return view('pagination',compact('users'));
    }
}
