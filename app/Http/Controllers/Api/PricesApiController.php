<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Dotenv\Validator;

class PricesApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Auth::user()->id;
        $precios = Price::get()->where('user_id', '=', 'usuario');
        return view('precios.index', compact('precios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
            'precio.required' =>'El precio es obligatorio.',
            'precio.double' => 'El precio no puede ser distinto a numeros o numeros con decimales ( 1 Hora / 1.5 horas ).',
            'precio.min' => 'Debes poner minimo un Euro/Dolar.',

            'horas.required' =>'Es las horas son obligatorias',
            'horas.integer' =>'Es obligatorio las horas sea un numero entero.',
            'horas.min' =>'Debes poner minimo una Hora.',
        */
        $validator = Validator::make($request->all(), [
            'precio' => 'required|double|min:1',
            'horas' => 'required|integer|min:1',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $price = new Price;
            $price->precio = $request->input('precio');
            $price->horas = $request->input('horas');
            $price->save();
            return response()->json([
                'status'=>200,
                'message'=>'Precio Añadido Correctamente.'
            ]);
        }

        /*
            $validator = PriceValidator::make($request->all(), [
                'nombre' => 'required|double|min:5|max:20',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 401);
            } else {
                $price = new Price();
                $price -> nombre = $request->get('nombre');

                $price->save();

                return response()->json(['Categoria' => $price->nombre], 201);
            }

            return view('precios.create');

            $validator = Validator::make($request->all(), [
                'nombre' => 'required|double|min:5|max:20',
            ]);
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function show(Price $price)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Price $price)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $price)
    {
        //
    }
}
