<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Carro;
use Illuminate\Http\Request;

class CarroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Carro::all(),200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validar datos
        $datos = $request->validate([
           'nombre' =>['required', 'string', 'max:100'],
           'descripcion'=>['nullable', 'string', 'max:255'],
           'precio'=>['required', 'integer', 'min:1000'],
           'stock'=>['required', 'min:1']
        ]);
        //guardar datos
        $carro= Carro::create($datos);
        //respuesta al cliente
        return response()->json([
           'success'=> true,
           'message'=>'Producto creado exitosamente',
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Carro $carro)
    {
        return response()->json($carro,200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carro $carro)
    {
        $datos = $request->validate([
            'nombre' =>['required', 'string', 'max:100'],
            'descripcion'=>['nullable', 'string', 'max:255'],
            'precio'=>['required', 'integer', 'min:1000'],
            'stock'=>['required', 'min:1']
         ]);
         //actualiza datos
         $carro ->update ($datos);
         //respuesta al cliente
         return response()->json([
            'success'=> true,
            'message'=>'Producto actualizado exitosamente',
         ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carro $carro)
    {
        //eliminar producto
        $carro->delete();
        return response()->json([
            'success'=> true,
            'message'=>'Producto eliminado exitosamente',
         ],204); 
    }
}
