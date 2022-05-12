<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        $precios = Price::where('user_id', '=', $user)->paginate(6); //get, cogeme todos los precios, where, mientras sean de el id del usuario actual
        return view('precios.index', compact('precios','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user()->id;
        $comprobador = Price::where('user_id', '=', $user); //get, cogeme todos los precios, where, mientras sean de el id del usuario actual
        return view('precios.create', compact('comprobador'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $price = new Price();
        $price->user_id = Auth::user()->id;
        $price->nombrePack = $request->get('nombrePack');
        $price->precio = $request->get('precio');
        $price->ventajaUno = $request->get('ventajaUno');
        $price->ventajaDos = $request->get('ventajaDos');
        $price->ventajaTres = $request->get('ventajaTres');
        $price->save();
        return view('precios.store', compact('price'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function show(Price $precio)
    {

        return view('precios.show', compact('precio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function edit(Price $price)
    {
        return view('precios.edit', compact('price'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Price $precio)
    {
        $precio->nombrePack = $request->get('nombrePack');
        $precio->precio = $request->get('precio');
        $precio->ventajaUno = $request->get('ventajaUno');
        $precio->ventajaDos = $request->get('ventajaDos');
        $precio->ventajaTres = $request->get('ventajaTres');
        $precio->save();
        // return view('precios.store', compact('price'));
        return redirect()->route('precios.update', compact('price'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $precio)
    {
        $precio->delete();
        return redirect()->route('precios.index');
    }
}
