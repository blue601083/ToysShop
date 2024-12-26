<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request as FacadesRequest;

class AdminController extends Controller
{
    public function home()
    {
        return view("admin.home");
    }

    public function login()
    {
        return view("admin.login");
    }

    public function postLogin(Request $request)
    {
        // 驗證帳號密碼
        $account = $request->input('account');
        $password = $request->input('password');

        $admin = DB::table('admins')->where('account', $account)->first();

        if ($admin && $admin->account == $account && $admin->password == $password) {
            // 登入成功，儲存 session
            session(['Id' => $admin->Id, 'name' => $admin->name]);

            // 登入成功後，重定向到 admin.home
            return redirect()->route('admin.home');
        } else {
            // 登入失敗
            return back()->withErrors(['admin.login' => '帳號或密碼錯誤']);
        }
    }

    public function forget()
    {
        return view("admin.forget");
    }

    public function postForget(Request $req)
    {

        $account = $req->input('account');
        $newPassword = $req->input('newPassword');
        $reNewPassword = $req->input('reNewPassword');

        $data = DB::table('admins')->where('account', $account)->first();

        if ($data == null) {
            return back()->withErrors(['admin.forget' => '無此帳號，請重新輸入']);
        }

        if ($newPassword !== $reNewPassword) {
            return back()->withErrors(['admin.forget' => '密碼輸入不一致，請重新輸入']);
        }

        // 更新密碼
        DB::table('admins')->where('account', $account)->update([
            'password' => Hash::make($newPassword), // 使用 Hash 加密密碼
        ]);

        // 更新成功提示
        return redirect()->route('admin.login')->with('success', '密碼重置成功，請重新登入');
    }
}
