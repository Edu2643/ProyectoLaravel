<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use App\Models\Pedidos;
use DateTime;
use Session;

class CarritoController extends Controller
{
    
    public function __construct(){
        if(!Session::has('carrito'))
        Session::put('carritos',array());
    }

    public function show(){
        $carrito = Session::get('carrito');
        //return $carrito;
        $total = $this->total();    
        return view('carrito',compact('carrito','total'));
    }

    public function add($id){
        $carrito = Session::get('carrito');
        $producto = Productos::find($id);

        $producto->cantidad = 1;

        $carrito[$producto->id] = $producto;
        Session::put('carrito',$carrito);
        //return Session::get('carrito');
        return redirect()->route('carrito');

    }

    public function delete($id){
        $carrito = Session::get('carrito');
        unset($carrito[$id]);
        Session::put('carrito',$carrito);
        return redirect()->route('carrito');
    }

    public function trash(){
        Session::forget('carrito');
        return redirect()->route('carrito');
    }

    public function update($id,$cantidad){
        $carrito = Session::get('carrito');
        $productos = Productos::find($id);
        $carrito[$productos->id]->cantidad = $cantidad;

        Session::put('carrito',$carrito);
        return redirect()->route('carrito');
    }
    public function total()
{
    $carrito = Session::get('carrito');
    $total = 0;

    if ($carrito) {
        foreach ($carrito as $item) {
            $total += $item->precio * $item->cantidad;
        }
    }

    return $total;
}


    public function guardarPedido()
{
    $carrito = Session::get('carrito');
    if (count($carrito)) {
        $now = new DateTime();
        $numero = $now->format('Ymd-His');
        foreach ($carrito as $producto) {
            $this->guardarItem($producto, $numero);
        }
        // Vaciar el carrito después de guardar el pedido
        Session::forget('carrito');
    }

    // Redirigir a una vista específica
    return redirect()->route('productos.index');
}

    public function guardarItem($producto,$numero){
        $productoguardado = Pedidos::create([
            'numero'=>$numero,
            'idproducto'=>$producto->id,
            'cantidad'=>$producto->cantidad,
            'precio'=>$producto->precio
        ]);
    }
}
