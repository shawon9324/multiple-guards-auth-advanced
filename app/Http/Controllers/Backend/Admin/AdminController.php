<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Session;
class AdminController extends Controller
{
    public function dashboard()
    {
        return view('backend.admin.dashboard');
    }
    public function login(Request $request)
    {
        if(Auth::guard('admin')->check()){
            return redirect('admin/dashboard');
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'email' => 'required|email',
                'password' => 'required',
            ];
            $customMessage = [
                'email.required' => 'Email is required',
                'email.email' => 'Valid Email is required',
                'password.required' => 'Password is required'
            ];
            $this->validate($request, $rules, $customMessage);

            if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
                toastr()->success('','You have successfully logged in');
                return redirect('admin/dashboard');
            } else {
                Session::flash('error_message', 'Email & password do not match');
                return redirect()->back();
            }
        }
        return view('backend.admin.login');
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        toastr()->success('','You have successfully logged out');
        return redirect('/admin');
    }
    public function viewUser()
    {
        $users = Admin::all()->toArray();
        return view('backend.admin.user.view_user')->with(compact('users'));
    }
    public function addUser()
    {
        return view('backend.admin.user.add_user');
    }
    public function storeUser(Request $request)
    {
        $data = $request->all();
        $user = new Admin;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->user_type = $data['user_type'];
        $user->save();
        toastr()->success('Success','User Created Successfully');
        return redirect()->route('users.view');
    }
    public function userEmailCheck(Request $request)
    {
        $data = $request->all();
        $count = Admin::where('email',$data['email'])->count();
        if ($count > 0) {
            echo "false";
        }else{
            echo "true";
        }
    }
    public function editUser($id)
    {
        $editData = Admin::find($id);
        return view('backend.admin.user.edit_user')->with(compact('editData'));
    }
    public function updateUser(Request $request, $id)
    {
        $data = $request->all();
        $user = Admin::find($id);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->user_type = $data['user_type'];
        $user->save();
        toastr()->success('Success','User Updated Successfully');
        return redirect()->route('users.view');
    }
    public function deleteUser(Request $request)
    {
        Admin::find($request['id'])->delete();
    }
    public function forgotPassword(Request $request)
    {
        $data = $request->all();
        $emailCount = Admin::where('email',$data['email'])->count();
        if($emailCount ==0){
            return response()->json(['status'=>'not_exist']);
        }else{
            $email = $data['email'];
            $messageData = [
                'email'=>$email,
                'auth'=> base64_encode($email),
            ];
            Mail::send('backend.admin.email.reset_password_mail',$messageData, function($message) use($email){
                $message->to($email)->subject('Account Recovery of SMS System Account');
            });
            return response()->json(['status'=>'email_send_success']);
        }
    }
    public function recoverAccount(Request $request, $email){
        
        
        $email_check = base64_decode($email);
        $userCount = Admin::where('email',$email_check)->count();
        if($userCount>0){
            if($request->isMethod('post')){
                $data = $request->all();
                Admin::where('email',$email_check)->update(['password'=>bcrypt($data['password'])]);
                toastr()->info('Please Login with your email & Password','Your password has been changed successfully');
                return redirect()->route('admin.login');
            }
        }
        else{
            abort(404);
        }
        return view('backend.admin.user.password_reset')->with(compact('email'));
    }
}
