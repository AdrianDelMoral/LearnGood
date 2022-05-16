<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Redirect;

class PriceController extends Controller
{
    public function index()
    {
        // usuario conectado actualmente
        $user = Auth::user()->id;

        // sacar los precios del profesor que esta actualmente logeado
        $precios = Price::where('user_id', '=', $user)->get();
        // devuelve los datos de ese usuario y sus precios
        return view('precios.index', compact('precios', 'user'));
    }

    public function create()
    {
        return view('precios.create');
    }

    public function store(Request $request)
    {
        // Le dejará crear precios, hasta un maximo de 3
        if (Price::count() < 3) {
            $request->validate([
                'user_id' => 'required',
                'nombrePack' => 'required|string|max:100',
                'precio' => 'required|integer',
                'ventajaUno' => 'required|string|max:200',
                'ventajaDos' => 'string|max:200',
                'ventajaTres' => 'string|max:20',
            ]);

            Price::create($request->only('user_id', 'nombrePack', 'precio', 'ventajaUno', 'ventajaDos', 'ventajaTres'));

            // Mensaje para indicar en index que se a creado con exito
            return Redirect::Route('precios.index')->with('createMsj', 'Precio Creado con Exito.');

        // Le impedriá crear más precios ya que tiene 3 que es su maximo
        } else {
            return Redirect::Route('precios.index')->with('errorMsj', 'Ya no pedes crear mas Precios, solo puedes tener un máximo de 3');
        }
    }

    public function show(Price $precio)
    {
    }

    public function edit(Price $precio)
    {
        return view('precios.edit')->with('precio', $precio);
    }

    public function update(Request $request, Price $precio)
    {
        $request->validate([
            'user_id' => 'required',
            'nombrePack' => 'required|string|max:100',
            'precio' => 'required|integer',
            'ventajaUno' => 'required|string|max:200',
            'ventajaDos' => 'string|max:200',
            'ventajaTres' => 'string|max:20',
        ]);
        $precio->user_id = $request['user_id'];
        $precio->nombrePack = $request['nombrePack'];
        $precio->precio = $request['precio'];
        $precio->ventajaUno = $request['ventajaUno'];
        $precio->ventajaDos = $request['ventajaDos'];
        $precio->ventajaTres = $request['ventajaTres'];
        $precio->update();

        // Mensaje para indicar en index que se a actualizado con exito
        return Redirect::Route('precios.index')->with('updateMsj', 'Precio Actualizado con Exito.');
    }

    public function destroy(Price $precio)
    {
        $precio->delete();

        // Mensaje para indicar en index que se a eliminado con exito
        return Redirect::Route('precios.index')->with('errorMsj', 'Precio Eliminado con Exito.');
    }
}
