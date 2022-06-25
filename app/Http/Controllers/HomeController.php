<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Interests;
use App\Models\Message;
use App\Models\User;
use Hamcrest\Arrays\IsArray;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }





    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = auth()->user()->id;
        $user = User::getPairs($id);
        $chats = Chat::getChats($id);

        if ($user != null) {
            $u_id = $user['id'];
            $name = $user['name'];
            $gender = $user['gender'];
            $description = $user['description'];

        } else {
            $u_id = null;
            $name = 'No pairs left!';
            $gender = '';
            $description = 'There are no potential pairs left!';
        }
        session(['u_id' => $u_id]);
        session(['name' => $name]);
        return view('layouts.app', ['name' => $name, 'gender' => $gender, 'description' => $description, 'chats' => $chats]);
    }

    public function like()
    {
        $id = auth()->user()->id;
        $u_id = session('u_id');
        $name = session('name');
        if (isset($_POST['like'])) {
            if (session('u_id') != null) {
                Interests::likeUser($id, $u_id);
                $paired = Interests::pairExists($id, $u_id);
                if ($paired == true) {
                    Chat::makeChat($u_id, $id);
                    Chat::makeChat($id, $u_id);
                    return redirect('app')->with('flash_message_success', Lang::get('pairs.paired'));
                } else {
                    return redirect('app')->with('flash_message_success', Lang::get('pairs.liked').$name);
                }
            } else {
                return redirect('/app')->with('flash_message_error', Lang::get('pairs.failed'));
            }
        }
    }
}
