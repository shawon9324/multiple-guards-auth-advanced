<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class ProfileController extends Controller
{
    public function viewProfile()
    {
        $id = Auth::guard('admin')->user()->id;
        $user = Admin::where('id',$id)->first()->toArray();
        // echo "<pre>" ; print_r($user); die;
        return view('backend.admin.profile.view_profile')->with(compact('user'));
    }
    public function editProfile()
    {
        $id = Auth::guard('admin')->user()->id;
        $user = Admin::where('id',$id)->first()->toArray();
        // echo "<pre>" ; print_r($user); die;
        return view('backend.admin.profile.view_profile')->with(compact('user'));
    }
    public function updateProfile(Request $request)
    {
        $data = $request->all();
        $id = Auth::guard('admin')->user()->id;
        $user = Admin::where('id',$id)->first();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->mobile = $data['mobile'];
        $user->gender = $data['gender'];
        $user->address = $data['address'];
        $user->save();
        $user = Admin::where('id',$id)->first()->toArray();
        return response()->json([
            'view'=>(String)View::make('backend.admin.profile.profile_details')->with(compact('user'))
        ]);
    }
    public function updateProfilePicture(Request $request){
        $data = $request->all();
        $id = Auth::guard('admin')->user()->id;
        $user = Admin::where('id',$id)->first();
        $old_image = $user['image'];
        $img_tmp = $request->file('image');
            if ($img_tmp) {
                if(file_exists($old_image))
                {
                    unlink($old_image);
                }else{
                }
                $image_name = date('dmy_H_s_i');
                $extention = strtolower($img_tmp->getClientOriginalExtension());
                $image_full_name = 'user_image_'.$image_name . '.' . $extention;
                $upload_path = 'upload/user_images/';
                $image_url = $upload_path . $image_full_name;
                $img_tmp->move($upload_path, $image_full_name);
                $user->image = $image_url;
        }
        $user->save();
        $user = Admin::where('id',$id)->first()->toArray();
        return response()->json([
            'view'=>(String)View::make('backend.admin.profile.profile_details')->with(compact('user'))
        ]);
    }
    public function updatePassword(Request $request){
        $data = $request->all();
        if($data['new_password'] == null){
            return false;
        }else{
            // echo "<pre>" ; print_r($data); die;
            $id = Auth::guard('admin')->user()->id;
            Admin::where('id',$id)->update(['password'=>bcrypt($data['new_password'])]);
            return response()->json(['status'=>'true']);
        }
    }
    public function passwordCheck(Request $request){
        $data = $request->all();
        if (Hash::check($data['current_password'], Auth::guard('admin')->user()->password)){
            echo "true";
        }else{
            echo "false";
        }
    }
}
