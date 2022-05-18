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

        // return $ordersTeacher = Order::whereHas('getProfesor', Auth::user()->id)->get();

        $ordersTeacher = Order::whereHas('getProfesor', function ($query) {
            $query->where('user_id_profesor',Auth::user()->id);
        })->get();

        return view('ordersteacher.index',compact('ordersTeacher'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Order $ordersteacher)
    {
        //
    }

    public function edit(Order $ordersteacher)
    {

        $status = $ordersteacher->get('status');

        if ($status == false) {
            $ordersteacher->status = 1;
            $ordersteacher->update();

            return Redirect::Route('ordersteacher.index')->with('updateMsj', 'Estado Actualizado con exito.');

        } else if ($ordersteacher->get('status') == true) {

            return Redirect::Route('ordersteacher.index')->with('errorMsj', 'Este Alumno ya tiene permiso para entrar al curso.');
        }
    }

    public function update(Request $request, Order $ordersteacher)
    {

    }

    public function destroy(Order $ordersteacher)
    {
        //
    }
}
