<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Quiz;
use App\Models\Contact;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class AuthController extends Controller
{
    public function web(){
        $data = array(
            'quizzes' => Quiz::orderBy('id','desc')->limit(4)->get()
        );
        return view('web', $data);
    }
    public function index(){
        return view('index');
    }
    public function regView(){
        return view('reg');
    }

    public function regAction(Request $request){
        User::create([
           'username'=>$request->user,
            'password'=>Hash::make($request->pass)
        ]);
        $user=User::where('username',$request->user)->first();
        UserRole::create([
            'user_id'=>$user->id,
            'role_name'=>'user'
        ]);
        return redirect()->route('login.view');
    }

    public function loginAction(Request $request){
        $user=User::where('username',$request->user)->first();
        if (isset($user)){
            if($request->user==$user->username){
                if(Hash::check($request->pass,$user->password)){
                    $request->session()->put('user_id',$user->id);
                    return redirect()->route('dashboard.view')->with('msg','Successfully Logged in!');
                }
                else{
                    return redirect()->route('login.view')->with('error','Wrong Password');
                }
            }
        }
        else{
            return redirect()->route('login.view')->with('error','User not found');
        }
    }

    public function dashboardView(){
        return view('dashboard');
    }
    public function logout(){
        session()->flush();
        return redirect()->route('web.view');
    }

    public function contact(Request $request)
    {
        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'description' => $request->description,
            'status' => 0,
        );
        if (Contact::insert($data)) {
            return back()->with('success','Message sent successfully!');
        }else{
            return back()->with('error','Failed to send!');
        };
    }

    public function inbox()
    {
        $data = array(
            'data' => Contact::orderBy('id', 'desc')->get(),
        );
        return view('inbox',$data);
    }

    public function inbox_details($id)
    {
        Contact::where('id',$id)->update([
            'status' => 1
        ]);
        $data = array(
            'data' => Contact::findOrFail($id),
        );
        return view('inbox-details',$data);
    }
}
