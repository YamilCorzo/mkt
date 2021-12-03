<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;

class Productos extends Component
{
    public $productos;

    public function delete($id){
        $producto = Producto::find($id);
        $producto->status = 2;
        $producto->save();
    }

    public function render()
    {
        $this->productos = Producto::where('status', 1)->get()  ;
        return view('livewire.productos');
    }
}
