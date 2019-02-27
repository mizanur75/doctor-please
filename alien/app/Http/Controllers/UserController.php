<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Image;
use Auth;
use DB;


class UserController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index(Request $request)
    {
      if(!empty($request->cmbUserType) || !empty($request->txtSearchName))
      {
        $sName=!empty($request->txtSearchName)?$request->txtSearchName:'';
        $sUserType=!empty($request->cmbUserType)?$request->cmbUserType:'';

        $aItems=DB::table('users');
        if($sName){$aItems->where('name', 'LIKE', "%$sName%");}
        if($sUserType){$aItems->where('user_type', '=', "$sUserType");}
        $qUsers=$aItems->orderBy('id', 'desc')->paginate(10);

        return view('admin-dashboard.user', compact('qUsers'));
      }
      else
      {
        $qUsers=DB::table('users')->orderBy('id', 'desc')->paginate(10);
        return view('admin-dashboard.user', compact('qUsers'));
      }

    }

    public function store(Request $request)
    {
      $this->validate($request,[
        'txtFullName' => 'required|max:129',
        'email' => 'required|email|max:69|unique:users',
        'txtMobile' => 'required|min:11|numeric',
        'txtAddress' => 'required',
        'cmbUserType' => 'required'
      ]);

      $sGeneratHtml=$request->rdoGenerateHTML;
      $sImageDirectoryPath="";
      $sDirectory=date('Y');

      if(!empty($request->file('fImageFile')))
      {
        $fImage = $request->file('fImageFile');
        $sImageName = time().'.'.$fImage->getClientOriginalName();
        $sDirectoryPath='images/'.$sDirectory.'/profile';
        $sImageDirectoryPath=$sDirectoryPath.'/'.$sImageName;
        $sImageThumb = Image::make($fImage->getRealPath())->resize(280, 300);
        $sImageThumb->save($sDirectoryPath.'/'.$sImageName,80);
      }

      DB::table('users')->insert([
        'name'=>$request->txtFullName,
        'user_type'=>$request->cmbUserType,
        'email'=>$request->email,
        'mobile'=>$request->txtMobile,
        'address'=>$request->txtAddress,
        'image_path'=>$sImageDirectoryPath,
        'password'=> bcrypt('1234567'),
        'remember_token' => $request->_token,
        'created_at' =>  date('Y-m-d H:i:s'),
        'updated_at' =>  date('Y-m-d H:i:s')
      ]);

      $iContentID = DB::getPdo()->lastInsertId();

      //Create Doctor Profile
      if($request->cmbUserType=='7docTor9')
      {
        DB::table('doctor_profile')->insert([
          'user_id'=>$iContentID,
          'doctor_name'=>$request->txtFullName,
          'email'=>$request->email,
          'mobile'=>$request->txtMobile,
          'profile_image'=>$sImageDirectoryPath,
          'is_active'=>'Y',
          'remember_token' => $request->_token,
          'create_user_id'=>Auth::user()->id,
          'update_user_id'=>Auth::user()->id,
          'create_user_ip'=>$request->ip(),
          'update_user_ip'=>$request->ip(),
          'created_at' =>  date('Y-m-d H:i:s'),
          'updated_at' =>  date('Y-m-d H:i:s')
        ]);
      }

      //Send to request generate html file
      if($sGeneratHtml== 'Y')
      {
        return redirect()->action('GenerateHTMLController@generate', ['iContentID' => $iContentID, 'sCategoryID'=>'doctor']);
      }
      elseif($sGeneratHtml== 'N')
      {
        $request->session()->flash('alert-success', 'User information was successfully added.');
        return redirect('user-information');
      }

    }

    public function update(Request $request, $id)
    {
      $this->validate($request,[
        'txtFullName' => 'required|max:129',
        'txtMobile' => 'required|min:11|numeric',
        'txtAddress' => 'required',
        'cmbUserType' => 'required'
      ]);

      $sGeneratHtml=$request->rdoGenerateHTML;
      $sImageDirectoryPath=$request->fOldImage;
      $sDirectory=date('Y');

      if(!empty($request->file('fImageFile')))
      {
        $sImageDirectoryPath="";
        if($request->validate_agree=='D')
        {
          unlink($request->fOldImage);
        }
        $fImage = $request->file('fImageFile');
        $sImageName = time().'.'.$fImage->getClientOriginalName();
        $sDirectoryPath='images/'.$sDirectory.'/profile';
        $sImageDirectoryPath=$sDirectoryPath.'/'.$sImageName;
        $sImageThumb = Image::make($fImage->getRealPath())->resize(280, 300);
        $sImageThumb->save($sDirectoryPath.'/'.$sImageName,80);;
      }

      DB::table('users')->where('id', $id)->update([
        'name'=>$request->txtFullName,
        'user_type'=>$request->cmbUserType,
        'mobile'=>$request->txtMobile,
        'address'=>$request->txtAddress,
        'image_path'=>$sImageDirectoryPath,
        'is_active'=>$request->rdoIsActive,
        'remember_token' => $request->_token,
        'updated_at' =>  date('Y-m-d H:i:s')
      ]);

      //Update Doctor Profile Active Status
      if($request->cmbUserType=='7docTor9')
      {
        DB::table('doctor_profile')->where('user_id',$id)->update([
          'is_active'=>$request->rdoIsActive,
          'remember_token' => $request->_token,
          'update_user_id'=>Auth::user()->id,
          'update_user_ip'=>$request->ip(),
          'updated_at' =>  date('Y-m-d H:i:s')
        ]);
      }


      $iContentID = $id;
      //Send to request generate html file
      if($sGeneratHtml== 'Y')
      {
        return redirect()->action('GenerateHTMLController@generate', ['iContentID' => $iContentID, 'sCategoryID'=>'doctor']);
      }
      elseif($sGeneratHtml== 'N')
      {
        $request->session()->flash('alert-success', 'User information was successfully updated.');
        return redirect('user-information');
      }

    }

}
