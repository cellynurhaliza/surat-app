<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function StaffIndex()
    {
        $orders = Order::all();
        return view('order.staff.index', compact('orders'));
    }

    public function GuruIndex()
    {
        $orders = Order::all();
        return view('order.guru.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function StaffCreate()
    {
        $orders = Order::all();
        return view("order.staff.create", compact('orders'));
    }

    public function GuruCreate()
    {
        $orders = Order::all();
        return view("order.guru.create", compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function StaffStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);

        $namePrefix = substr($request->nama, 0, 3);

        Order::create([
            'name' => $request->name,
            'password' => $request->password,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->route('order.staff.index')->with('success', 'Berhasil menambahkan data!');
    }

    public function GuruStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);

        $namePrefix = substr($request->nama, 0, 3);

        Order::create([
            'name' => $request->name,
            'password' => $request->password,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->route('order.guru.index')->with('success', 'Berhasil menambahkan data!');
    }

    /**
     * Display the specified resource.
     */
    public function StaffShow(Order $order)
    {
        //
    }

    public function GuruShow(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function StaffEdit(Order $order, $id)
    {
        $orders = Order::find($id);
        return view('order.staff.edit', compact('orders'));
    }

    public function GuruEdit(Order $order, $id)
    {
        $orders = Order::find($id);
        return view('order.guru.edit', compact('orders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function StaffUpdate(Request $request, Order $order, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $ubahData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,  
        ];

        Order::where('id', $id)->update($ubahData);

        return redirect()->route('order.staff.index')->with('success', 'Berhasil mengubah data!');
    }

    public function GuruUpdate(Request $request, Order $order, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $ubahData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,  
        ];

        Order::where('id', $id)->update($ubahData);

        return redirect()->route('order.guru.index')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function StaffDestroy(Order $order, $id)
    {
        Order::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Data berhasil di hapus!');
    }

    public function GuruDestroy(Order $order, $id)
    {
        Order::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Data berhasil di hapus!');
    }
}
