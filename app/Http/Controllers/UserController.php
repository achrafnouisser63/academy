<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseOrder; // إضافة هذا السطر لاستيراد النموذج

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users');
    }
    public function pending()
    {
        return view('admin.Pending_purchase_orders');
    }
    public function completed()
    {
        $purchaseOrders = \App\Models\PurchaseOrder::with(['user', 'course'])->get();
        return view('admin.Completed_purchase_orders', compact('purchaseOrders'));
    }

    public function edit($id)
    {
        $user = \App\Models\User::findOrFail($id);
        return view('admin.edite_users', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = \App\Models\User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'phone' => 'required'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('users')->with('success', 'تم تحديث بيانات المستخدم بنجاح');
    }

    public function destroy($id)
    {
        $user = \App\Models\User::findOrFail($id);
        $user->delete();
        return redirect()->route('users')->with('success', 'تم حذف المستخدم بنجاح');
    }



}
