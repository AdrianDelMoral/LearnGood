<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OrderStudentController extends Controller
{
    public function index()
    {
        $ordersStudent = Order::get();
        return view('ordersStudent.index',compact('ordersStudent'));
    }

    public function create()
    {
        $prices = Price::All();
        return view('ordersStudent.form', compact('prices'));
    }

    public function store(Request $request)
    {
        // Le dejará crear precios, hasta un maximo de 3
        $request->validate([
            'user_id_alumno' => 'required',
            'prices_id' => 'required|integer',
        ]);

        Order::create([
            'user_id_alumno' => $request->get('user_id_alumno'),
            'prices_id' => $request->get('prices_id'),
        ]);

        return Redirect::Route('ordersStudent.index')->with('createMsj', 'Pedido Creado con Exito.');
    }

    public function show(Order $order)
    {
        //
    }

    public function edit(Order $order)
    {
        $prices = Price::All();
        return view('ordersStudent.form', compact('prices'))->with('order');
    }

    public function update(Request $request, Order $order)
    {
        dd($order);
        $request->validate([
            'user_id_alumno' => 'required',
            'prices_id' => 'required|integer',
        ]);

        $order->update();

        // Mensaje para indicar en index que se a actualizado con exito
        return Redirect::Route('platforms.index')->with('updateMsj', 'Pedido Actualizado con Exito.');
    }

    public function destroy(Order $order)
    {
        //
    }
}
