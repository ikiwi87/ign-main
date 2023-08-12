<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::All();
        return view('be/user/list', compact('users'));
    }

    public function dashboard()
    {
        return view('be/home');
    }

    public function create()
    {
        $roles = Role::All();
        return view('be/user/add', compact('roles'));
    }
    public function store(Request $rq)
    {
        $this->validate($rq,[

        ],[

        ]);
        $users = new User();
        $users->name = $rq->fullname;
        $users->email = $rq->email;
        $users->role_id = $rq->role_id;
        $users->password = bcrypt($rq->password);
        if ($rq->hasFile('image')) {
            $file = $rq->file('image');
            $name = $file->getClientOriginalName();
            $img = str_random(4)."-".$name;
            while (file_exists("upload/users/".$img)){
                $img = str_random(4)."-".$name;
            }
            $file->move("upload/users", $img);
            $users->image = $img;
        } else {
            $users->image = "default.png";
        }

        $users->save();
        return redirect()->route('user_dashboard')->with('msg','Add new administrator success!');
    }

    public function edit($id)
    {
        $roles = Role::All();
        $user = User::Find($id);
        return view('be/user/edit', compact('roles', 'user'));
    }

    public function update(Request $rq, $id)
    {
        $this->validate($rq,[

        ],[

        ]);
        $users = User::Find($id);
        $users->name = $rq->fullname;
        $users->email = $rq->email;
        $users->role_id = $rq->role;
        if ($rq->changepass == "on")
        {
            $this->validate($rq,[
                'password' => 'required',
                'repassword' => 'required|same:password',
            ],[
                'name.required' => 'mật khẩu không được để trống',
                'repassword.same' => 'mật khẩu nhập lại chưa đúng'
            ]);
            $users->password = bcrypt($rq->password);
        }
        if ($rq->HasFile('image')) {
            $file = $rq->file('image');
            $name = $file->getClientOriginalName();
            $img = str_random(4)."-".$name;
            while (file_exists("upload/users/".$img)){
                $img = str_random(4)."-".$name;
            }
            $file->move("upload/users", $img);
            unlink("upload/users/".$users->image);
            $users->image = $img;
        }
        $users->save();
        return redirect()->route('user_list')->with('msg','Edit administrator success!');
    }

    public function destroy($id)
    {
        $users = User::Find($id);
        $users->delete();
        return redirect()->route('user_list')->with('msg','Delete admin success!');
    }

    public function getloginadmin()
    {
        return view('be/login');
    }
    public function postloginadmin(Request $rq)
    {
        $this->validate($rq,[

        ],[

        ]);
        if (Auth::attempt(['email' => $rq->email, 'password' => $rq->password])) {
            return redirect('admin/users/dashboard');
        }
        else {
            return redirect('admin/login')->with('msg','sai tài khoản hoặc mật khẩu !');
        }
    }
    public function logoutadmin()
    {
        Auth::logout();
        return redirect('admin/login')->with('msg','Đăng xuất thành công !');
    }
}
