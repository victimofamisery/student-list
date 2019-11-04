<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Cookie;

class ProfileController extends Controller
{
   
            
    
    public function index(){
        if(null!==Cookie::get('Registered')){
	 $row=User::where('email',Cookie::get('Registered'));
    return view('editing',$row);    
        }
else
    return view('registration');   
}
    
    public function profile(Request $request){
            if(null!==Cookie::get('Registered'))
	return $this->editing($request);
else
	return $this->registration($request);
    }

public function registration(Request $request)	{
    $rules=[
        'firstname'=>'required|regex:/[А-ЯЁа-яё]/u',
        'secondname'=>'required|regex:/[А-ЯЁа-яё]/u',        
        'groupid'=>'required|between:2,5',
        'email'=>'required',
        'ege'=>'required|digits_between:1,3',
        'date'=>'required|'       
    ];
    $this->validate($request,$rules);

	$user=new User;
        $user->firstname=$request->firstname;
        $user->secondname=$request->secondname;
        $user->sex=$request->sex;
        $user->groupid=$request->number;
        $user->email=$request->email;
        $user->ege=$request->ege;
        $user->date=$request->date;
        $user->place=$request->place;
        $user->save();
Cookie::forever("Registered",$request->email);

return view ('success');

}







public function editing(Request $request){
if(((isset($request->firstname)&&(strlen($request->firstname)>=1))&&preg_match("/[А-ЯЁа-яё]/u", $request->firstname))
&&((isset($request->secondname)&&(strlen($request->secondname)>=1))&&preg_match("/[А-ЯЁа-яё]/u", $request->secondname))
&&(((isset($request->number))&&((mb_strlen($request->number)>=2)&&(mb_strlen($request->number)<=5)))&&preg_match("/[А-ЯЁа-яё0-9]/u", $request->number))
&&((isset($request->email))&&(mb_strlen($request->email)>=1))
&&((isset($request->ege))&&((mb_strlen((string)$request->ege)>=1)&&(mb_strlen((string)$request->ege)<=3)))
&&((isset($request->date))&&(mb_strlen((string)$request->date)>=1))){
        $user=User::where('email',$request->email);
        $user->firstname=$request->firstname;
        $user->secondname=$request->secondname;
        $user->sex=$request->sex;
        $user->groupid=$request->number;
        $user->email=$request->email;
        $user->ege=$request->ege;
        $user->date=$request->date;
        $user->place=$request->place;
        $user->save();
Cookie::forever("Registered",$request->email);
return view ('success');
}
else{
    $request->flash();
    return view('editing',$request);
}



}
}