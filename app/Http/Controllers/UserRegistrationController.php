<?php

namespace App\Http\Controllers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;
class UserRegistrationController extends Controller
{
    public function showRegistrationForm(){
        if(Auth::user()->role=='Admin'){
            return view('Admin.users.register');
        }else{
            return redirect('/home');
        }
        
    	
    }

    public function userSave(Request $request){
    	$this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $users = User::all();
        return view('Admin.users.user-list',['users'=> $users]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'role' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string','min:13', 'max:13'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    protected function create(array $data)
    {
        return User::create([
            'role' => $data['role'],
            'name' => $data['name'],
            'mobile' => $data['mobile'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function userlist(){
        if(Auth::user()->role=='Admin'){
    	 $users = User::all();
        return view('Admin.users.user-list',['users'=> $users]);

    }else{
        return redirect('/home');
    }
  }

  public function userprofile($userId){
          $usser=User::find($userId);
          
          return view('Admin.users.profile',compact('usser'));
  }
  public function chnageuserinfo($id){
    $user= User::find($id);
    return view('Admin.users.change-user-info',['userss'=>$user]);
  }
  public function userinfoupdate(Request $request){

      $this->validate($request,[
         'name'=>'required|string|max:225',
         'mobile'=>'required|string|max:13|min:13',
          'email'=>'required|string|max:225|email' 
        ]);


      $usser=User::find($request->user_id);
      $usser->name = $request->name;
      $usser->mobile = $request->mobile;
      $usser->email = $request->email;
      $usser->save();
      return redirect("/user-profile/$request->user_id")->with('message','Operation Successfull');

  }

  public function changeuserphoto($id){
     $usser=User::find($id);

     return view('Admin.users.change-user-avatar',['user'=>$usser]);

  }

  public function updateuserphoto(Request $request){
    $user=User::find($request->user_id);

    $file = $request->file('avatar');
    $imageName=  $file->getClientOriginalName();
    $directory = 'Admin/assets/avatar/';
    $imgUrl = $directory.$imageName;
    $file->move($directory,$imgUrl);


    $user->avatar = $imgUrl;
    $user->save();

    return redirect("/user-profile/$request->user_id");
  }
  public function changeuserpassword($id){
        $user=User::find($id);
        return view('Admin.users.change-user-password',['user'=>$user]);
  }

  public function userpasswordupdate(Request $request){


   $this->validate($request,[
    'newpassword' => ['required', 'string', 'min:8'],
    ]);



    $oldpassword = $request->password;
    $user = User::find($request->user_id);

    if(Hash::check($oldpassword,$user->password)){
        $user->password = Hash::make($request->newpassword);
         $user->save();
         return redirect("/user-profile/$request->user_id")->with('message','password update Successfull');
    }else{
        return back()->with('error_message','oldpassword does not match .please try again');
    }

  }
  
}
