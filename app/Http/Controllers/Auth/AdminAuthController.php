<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;


use Carbon\Carbon;
use Laravel\Sanctum\HasApiTokens;
// use Hash;
use Illuminate\Support\Facades\Hash;



class AdminAuthController extends Controller
{
    use HasApiTokens;
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function forgotPassword()
    {
        return view('auth.admin.forgot-password');
    }

    /**
     * Show the application loginprocess.
     *
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
      
        date_default_timezone_set('Asia/Kolkata');
         $currentdate=date("Y-m-d H:i:s");
      
        // dd(DB::connection());
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        $checklogin=User::where('username',$request->input('username'))->where('status',1)->first();
        if($checklogin)
        {
            if (auth()->guard('admin')->attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
                $user = auth()->guard('admin')->user();
                $update_lastlogin=User::where('username',$request->input('username'))->update(array('last_login'=>$currentdate));
                $user = auth()->guard('admin')->user();
                $mychecklogin=User::find($user->id);
                // $token = $mychecklogin->createToken('auth_token')->plainTextToken;
                // User::where('id',$user->id)->update(['admin_auth' =>$token]);
                // Session::put('token', $token);
                Session::put('user', $user->id);
                Session::put('success', 'You have successfully logged in!!');
                // return redirect()->route('admin.dashboard');
                return "success";
            } else {
                return "fail";
               // return back()->with('error', 'The username and password you entered are incorrect.');
            }
        }
        else{
            return back()->with('error', 'User is invalid');
        }
    }

    /**
     * Show the application logout.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        auth()->guard('admin')->logout();
        Session::flush();
        Session::put('success', 'Logout Successfully.');
        return redirect(route('adminLogin'));
    }

    // FORGET PASSWORD MAIL //
    public function postForgetPasswordMail(Request $request){
        $this->validate($request, [
            'email' => 'required|email|exists:admins'
        ]);
        $token = Str::random(12);
        $getHost = request()->getHttpHost();
        $emailStatus = new EmailStatus();
        $emailStatus->email_to = $request->email;
        $emailStatus->email_subject  = 'Forget Reset Password';
        $emailStatus->email_content  = 'You can reset password from bellow link';
        $emailStatus->cron_email_type = 'Forget Password';
        $emailStatus->cron_email_status = 'PENDING';
        $emailStatus->send_link = $getHost.'/admin/reset-password/'.$token;
        $emailStatus->save();
        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::send('admin.email.forgetPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        if(Mail::failures()){
            $updateEmailStatus = EmailStatus::find($emailStatus->id);
            $updateEmailStatus->cron_email_status = 'PENDING';
            $updateEmailStatus->update();
            return back()->with('error', 'Mail not send please try again!');
        }else{
            $updateEmailStatus = EmailStatus::find($emailStatus->id);
            $updateEmailStatus->cron_email_status = 'SUCCESS';
            $updateEmailStatus->update();
            return back()->with('message', 'We have e-mailed your password reset link.');
        }
    }


    public function showResetPasswordForm($token){
        return view('auth.admin.forgetPasswordLink', ['token' => $token]);
    }

    public function submitResetPasswordForm(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:admins',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);
        $updatePassword = DB::table('password_resets')->where(['email' => $request->email,'token' => $request->token])->first();
        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }
        $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
        DB::table('password_resets')->where(['email'=> $request->email])->delete();
        return redirect('/admin/login')->with('message', 'Your password has been changed!');
    }

}
