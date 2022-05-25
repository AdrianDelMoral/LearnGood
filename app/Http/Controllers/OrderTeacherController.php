<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Study;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class OrderTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $ordersTeacher = Order::whereHas('getProfesor', function ($query) {
            $query->where('user_id_profesor',Auth::user()->id);
        })->get();

        return view('ordersteacher.index',compact('ordersTeacher'));
    }

    public function edit(Order $ordersteacher)
    {
        if ($ordersteacher->status == false) {
            $ordersteacher->status = true;
            $ordersteacher->update();

            return Redirect::Route('ordersteacher.index')->with('updateMsj', 'Estado Actualizado con exito.');

        } else if ($ordersteacher->get('status') == true) {

            return Redirect::Route('ordersteacher.index')->with('errorMsj', 'Este Alumno ya tiene permiso para entrar al curso.');
        }
    }

    public function destroy(Order $ordersteacher)
    {
        $ordersteacher->delete();

        // Mensaje para indicar en index que se a eliminado con exito
        return Redirect::Route('ordersteacher.index')->with('errorMsj', 'Pedido Eliminado con Exito.');
    }
}
