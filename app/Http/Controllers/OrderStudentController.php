<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class OrderStudentController extends Controller
{
    public function index()
    {
        $ordersStudent = Order::where('user_id_alumno', Auth::user()->id)->get();
        return view('ordersstudent.index', compact('ordersStudent'));
    }

    public function createOrder(Course $cursoQuePide)
    {

        $datosPedido = Course::where('id', $cursoQuePide->id)->first();
        // return $ordersstudent;

        return view('ordersstudent.create', compact('datosPedido'));
    }

    public function infoOrder(Course $idOrder)
    {

        $datosOrder = Course::where('id', $idOrder)->first();
        // return $datosOrder;

        return view('ordersstudent.infoOrder', compact('datosOrder'));
    }

    public function store(Request $request)
    {

        $comprobador = Order::where([['user_id_alumno', Auth::user()->id], ['courses_id', $request->courses_id]])->find(1);

        /**
         * Comprueba que lo que devuelve del comprobador
         * - si existe ya uno devolverá 1, y redirigirá a la lista de pedidos, indicandole
         *   en un mensaje como que ya existe uno
         * - si no, devolverá 0 y dejará crearlo
        */

        if ($comprobador !== null) {

            return Redirect::Route('ordersstudent.index')->with('infoErrorMsj', 'Ya existe un pedido igual.');
        } else {
            Order::create([
                'user_id_alumno' => Auth::user()->id,
                'user_id_profesor' => $request->get('user_id_profesor'),
                'courses_id' => $request->get('courses_id'),
            ]);

            return Redirect::Route('ordersstudent.index')->with('createMsj', 'Pedido Creado con Exito.');
        }
        return 'llega 3';
    }

    public function destroy(Order $ordersstudent)
    {
        $ordersstudent->delete();

        // Mensaje para indicar en index que se a eliminado con exito
        return Redirect::Route('ordersstudent.index')->with('errorMsj', 'Pedido Eliminado con Exito.');
    }
}
