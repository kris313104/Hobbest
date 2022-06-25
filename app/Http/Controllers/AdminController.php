<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Failed_jobs;
use App\Models\Interests;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Migration;
use App\Models\Password_reset;
use App\Models\Personal_access_token;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;


class AdminController extends Controller
{
    public function login(Request $request)
    {
        if (Session::has('adminSession')) {
            return redirect('/admin/dashboard');
        } else {

            if ($request->isMethod('post')) {
                if (Session::has('adminSession')) {
                }
                $data = $request->input();
                if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'admin' => '1'])) {

                    Session::put('adminSession', $data['email']);
                    return redirect('/admin/dashboard');
                } else {

                    return redirect('/admin')->with('flash_message_error', Lang::get('admin.failed'));
                }
            }
        }

        return view('admin.admin_login');
    }

    public function dashboard()
    {
        if (Session::has('adminSession')) {
            //tasks
        } else {
            return redirect('/admin')->with('flash_message_error', Lang::get('admin.unauthorized'));
        }


        return view('admin.dashboard');
    }

    public function settings()
    {
        if (Session::has('adminSession')) {
            //tasks
        } else {
            return redirect('/admin')->with('flash_message_error', Lang::get('admin.unauthorized'));
        }
        return view('admin.settings');
    }

    public function tables()
    {
        if (Session::has('adminSession')) {

            $users = User::all();
            // $migrations = Migration::all();
            $chats = Chat::all();
            $messages = Message::all();
            $interests = Interests::all();
            // $failed_jobs = Failed_jobs::all();
            // $password_resets = Password_reset::all();
            // $personal_access_tokens = Personal_access_token::all();

            return view('admin.tables', [
                'users' => $users, 'chats' => $chats, 'messages' => $messages, 'interests' => $interests,
                ]);
        } else {
            return redirect('/admin')->with('flash_message_error', Lang::get('admin.unauthorized'));
        }
    }

    function deleteUser($id)
    {
        if (Session::has('adminSession')) {
            $data = User::find($id);
            if (session()->get('adminSession') == $data['email']) {
                return redirect('admin/tables')->with('flash_message_error', Lang::get('admin.unauthorized'));
            }
            $data->delete();
            return redirect('admin/tables')->with('flash_message_success', Lang::get('admin.success'));
        } else {
            return redirect('/admin')->with('flash_message_error', Lang::get('admin.unauthorized'));
        }
    }

    function editUser($id)
    {
        if (Session::has('adminSession')) {
            $user = User::find($id);
            if (isset($_POST['email'])) {
                DB::select('call edit_user('.$_POST['id'].', \''.$_POST['name'].'\', \''.$_POST['email'].'\', \''.$_POST['description'].'\', \''.$_POST['gender'].'\', \''.$_POST['pref_gender'].'\')');
                return redirect('/admin/tables')->with('flash_message_success', Lang::get('admin.success'));;
            } else {
                return view('admin.edit', ['user' => $user]);
            }
        }
    }


    public function register()
    {
        if (Session::has('adminSession')) {
            if (isset($_POST['email'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $description = $_POST['description'];
                $gender = $_POST['gender'];
                $pref_gender = $_POST['pref_gender'];

                if ($password != $_POST['password_confirmation']) {
                    return redirect('/admin/register')->with('flash_message_error', Lang::get('admin.passwords'));
                }

                if($gender == 'male' && $pref_gender == 'female'
                || $gender == 'male' && $pref_gender == 'male'
                || $gender == 'female' && $pref_gender == 'female'
                || $gender == 'female' && $pref_gender == 'male'
                ){

                        User::create([
                            'name' => $name,
                            'email' => $email,
                            'password' => Hash::make($password),
                            'description' => $description,
                            'gender' => $gender,
                            'pref_gender' => $pref_gender,
                            'admin' => true,

                        ]);

                        return redirect('/admin/register')->with('flash_message_success', Lang::get('admin.success'));

                    }else{
                        return redirect('/admin/register')->with('flash_message_error', Lang::get('admin.failed'));
                        // return redirect('/admin/register')->with('flash_message_error', $gender.'.'.$pref_gender);

                }


            }
        } else {
            return redirect('/admin')->with('flash_message_error', Lang::get('admin.unauthorized'));
        }
        return view('admin.register');
    }

    public function logout()
    {
        if (Session::has('adminSession')) {
            Session::flush();
            return redirect('/admin')->with('flash_message_success', Lang::get('admin.logout'));
        } else {
            return redirect('/admin')->with('flash_message_error', Lang::get('admin.unauthorized'));
        }
    }
}
