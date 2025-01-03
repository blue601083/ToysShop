<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function list()
    {
        $list = Product::with('category')->paginate(5);
        return view("admin.product.list", compact("list"));
    }

    public function add()
    {
        return view("admin.product.add");
    }

    public function insert(Request $req)
    {
        // 新增資料
        Product::Create([
            'name' => $req->name,
        ]);
        return redirect("/admin/product/list")->with("message", "新增成功!");
    }

    public function edit(Request $req)
    {
        $list = Product::find($req->Id);
        return view("admin.product.edit", compact("list"));
    }

    public function update(Request $req)
    {
        $list = Product::find($req->Id);
        if ($list) {
            $list->update([
                'name' => $req->name,
                'updateTime' => now()
            ]);

            // 更新成功，重定向
            return redirect("/admin/product/list")->with("message", "更新成功!");
        }
    }

    public function delete(Request $req)
    {
        Product::destroy($req->Id);
        return redirect("/admin/product/list")->with("message", "刪除成功!");
    }
}
