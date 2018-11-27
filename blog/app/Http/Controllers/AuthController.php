<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function dologin(Request $r)
  {

    $user = array(
      'email' => $r->input('username'),
      'password' => $r->input('password'),
      'role' => '1'
    );

    $user2 = array(
      'email' => $r->input('username'),
      'password' => $r->input('password'),
      'role' => '12'
    );

    $user1 = array(
      'name' => $r->input('username'),
      'password' => $r->input('password'),
      'role' => '1'
    );
    $user3 = array(
      'name' => $r->input('username'),
      'password' => $r->input('password'),
      'role' => '12'
    );

    if (auth()->attempt($user)) {
      return "success";
    }
    else if(auth()->attempt($user1))
    {

      return "success";
    }
    else if(auth()->attempt($user2))
    {

      return "success2";
    }
    else if(auth()->attempt($user3))
    {

      return "success2";
    }
    else {
      \Log::info(\Auth::check());
      return "failed";
    }
  }

  public function logout()
  {
    \Auth::logout();
    return redirect()->to('/index');
  }

  public function register(Request $r)
  {
    $cekuname = \App\User::where('name',$r->usernamed)->first();
    $cekemail = \App\User::where('email',$r->emaild)->first();

    if(!is_null($cekuname))
    {
      return 'fname';
    }
    else if(!is_null($cekemail))
    {
      return 'femail';
    }
    else {
      $user = new \App\User;
      $user->name = $r->usernamed;
      $user->email = $r->emaild;
      $user->password = \Hash::make($r->passwordd);
      $user->role = '2';
      $user->save();

      return 'success';
    }
  }

  public function editdata(Request $r)
  {
    if(isset($r->newpass) && isset($r->oldpass))
    {
      \Log::info(\Hash::check("111111",\App\User::where('id',\Auth::user()->id)->pluck('password')->first()));
      if(\Hash::check($r->oldpass,\App\User::where('id',\Auth::user()->id)->pluck('password')->first()))
      {
        $user = \App\User::find(\Auth::user()->id);
        $user->name = $r->username;
        $user->password = \Hash::make($r->newpass);
        $user->save();

        return 'success';

      }
      else
      {
        return 'fpass';
      }
    }
    else {
      $user = \App\User::find(\Auth::user()->id);
      $user->name = $r->username;
      $user->save();

      return 'success';
    }
  }
}
