<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ManagerController extends Controller
{
    public function list()
    {
        $list = Manager::get();
        return view("admin.manager.list", compact("list"));
    }

    public function add()
    {
        return view("admin.manager.add");
    }

    public function insert(Request $req)
    {
        $manager = Manager::where("account", $req->account)->first();
        if ($manager) {
            return back()->withErrors(["error" => "帳號已存在，請使用其他帳號!"])->withInput();
        }

        // 新增資料
        Manager::Create([
            'name' => $req->name,
            'account' => $req->account,
            'password' => Hash::make($req->password)
        ]);

        Session::flash("message", "新增成功!");
        return redirect("/admin/manager/list");
    }

    public function edit(Request $req)
    {
        $manager = Manager::find($req->Id);
        return view("admin.manager.edit", compact("manager"));
    }

    public function update(Request $req)
    {
        // 先檢查帳號是否已經存在
        $managerAccount = Manager::where("account", $req->account)->first();

        if ($managerAccount) {
            return back()->withErrors(["error" => "帳號已存在，請改用其他帳號!"])->withInput();
        }

        // 如果找到了該 Manager 實例，開始更新
        $manager = Manager::find($req->Id);
        if ($manager) {
            // 更新資料，若密碼欄位有值則加密密碼
            $manager->update([
                'name' => $req->name,
                'account' => $req->account,
                'password' => $req->password ? Hash::make($req->password) : $manager->password,
                'updateTime' => now()
            ]);

            // 更新成功，重定向
            return redirect("/admin/manager/list")->with("message", "更新成功!");
        }
    }

    public function delete(Request $req)
    {
        Manager::destroy($req->Id);
        return redirect("/admin/manager/list")->with("message", "刪除成功!");
    }
}