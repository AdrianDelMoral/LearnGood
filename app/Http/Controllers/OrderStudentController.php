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
        return view('ordersstudent.index', compact('ordersStudent'));
    }

    public function create()
    {
        return view('ordersstudent.create', compact('prices'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id_alumno' => 'required',
            'prices_id' => 'required|integer',
        ]);

        Order::create([
            'user_id_alumno' => $request->get('user_id_alumno'),
            'prices_id' => $request->get('prices_id'),
        ]);

        return Redirect::Route('ordersstudent.index')->with('createMsj', 'Pedido Creado con Exito.');
    }

    public function edit(Order $ordersstudent)
    {
        return view('ordersstudent.edit', compact('ordersstudent'));
    }

    public function update(Request $request, Order $ordersstudent)
    {
        $request->validate([
            'user_id_alumno' => 'required',
            'prices_id' => 'required|integer',
        ]);

        $ordersstudent->update();

        // Mensaje para indicar en index que se a actualizado con exito
        return Redirect::Route('ordersstudent.index')->with('updateMsj', 'Pedido Actualizado con Exito.');
    }

    public function destroy(Order $ordersstudent)
    {
        $ordersstudent->delete();

        // Mensaje para indicar en index que se a eliminado con exito
        return Redirect::Route('ordersstudent.index')->with('errorMsj', 'Pedido Eliminado con Exito.');
    }
}
