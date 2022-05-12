<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PriceController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $precios = Price::where('user_id', '=', $user)->paginate(6); //get, cogeme todos los precios, where, mientras sean de el id del usuario actual
        return view('precios.index', compact('precios','user'));
    }

    public function create()
    {
        $user = Auth::user()->id;
        $comprobador = Price::where('user_id', '=', $user); //get, cogeme todos los precios, where, mientras sean de el id del usuario actual
        return view('precios.create', compact('comprobador'));
    }

    public function store(Request $request)
    {

            /*
                $campos = [
                    'nombrePack'=>'required|string|max:100',
                    'precio'=>'required|double',
                    'ventajaUno'=>'required|string|max:200',
                    'ventajaDos'=>'string|max:200',
                    'ventajaTres'=>'string|max:200'
                ];
                $mensaje = [
                    'nombrePack.required'=>'El :attribute es requerido',
                    'nombrePack.string'=>'El Nombre del Pack debe ser texto',
                    'nombrePack.max:100'=>'El nombre del pack no puede ser tan largo...',

                    'precio.required'=>'El :attribute es requerido',
                    'precio.double'=>'El :attribute no puede ser diferente a numeros o double',

                    'ventajaUno.required'=>'La Primera Ventaja es requerido',
                    'ventajaUno.string'=>'La Primera Ventaja debe ser texto',
                    'ventajaUno.max:200'=>'La ventaja una no puede ser tan larga...',

                    'ventajaDos.string'=>'La Segunda Ventaja debe ser texto',
                    'ventajaDos.max:200'=>'La ventaja una no puede ser tan larga...',

                    'ventajaTres.string'=>'La Segunda Ventaja debe ser texto',
                    'ventajaTres.max:200'=>'La ventaja una no puede ser tan larga...',
                ];
                $this->validate($request, $campos, $mensaje);
            */

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

    public function show(Price $precio)
    {

        return view('precios.show', compact('precio'));
    }

    public function edit(Price $precio)
    {
        return view('precios.edit', compact('precio'));
    }

    public function update(Request $request, Price $precio)
    {
        $precio->nombrePack = $request->get('nombrePack');
        $precio->precio = $request->get('precio');
        $precio->ventajaUno = $request->get('ventajaUno');
        $precio->ventajaDos = $request->get('ventajaDos');
        $precio->ventajaTres = $request->get('ventajaTres');
        $precio->save();
        return view('precios.store', compact('price'));
        //return redirect()->route('precios.update', compact('price'));
    }

    public function destroy(Price $precio)
    {
        $precio->delete();
        return redirect()->route('precios.index');
    }
}
