<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductoRequest;

class ProductosController extends Controller
{
    public function saveProducto(ProductoRequest $request){
        try{

            $productoOb = $request->all();
            
            $image_path = $request->file('img');
            $video_path = $request->file('video');

           
            $nombrearchivo = time().'.'.$image_path->getClientOriginalName();
            $image_path->move(public_path('img'), $nombrearchivo);
            $productoOb['img'] = $nombrearchivo;
            
            $nombrevideo = time().'.'.$video_path->getClientOriginalName();
            $video_path->move(public_path('img'), $nombrevideo);
            $productoOb['video'] = $nombrevideo;
            
            $producto = Producto::create($productoOb);
            
            return redirect()->route('admin.productos.index');
            
        }catch(\Exception $e){
            return back()->withErrors(array('message'=>$e->getMessage()));
        }
    }

    public function editProducto($id){
        try{
            $producto = Producto::find($id);
            return view('admin.productos.form', ['producto' => $producto]);
        }catch(\Exception $e){
            return back()->withErrors(array('message'=>$e->getMessage()));
        }
    }

    public function updateProducto(ProductoRequest $request){
        try{
            $producto = Producto::find($request->id);
            $producto->name = $request->name;
            $producto->description = $request->description;
            $producto->price = $request->price;

            $image_path = $request->file('img');
            $video_path = $request->file('video');

           
            $nombrearchivo = time().'.'.$image_path->getClientOriginalName();
            $image_path->move(public_path('img'), $nombrearchivo);
            $producto->img = $nombrearchivo;
            
            $nombrevideo = time().'.'.$video_path->getClientOriginalName();
            $video_path->move(public_path('img'), $nombrevideo);
            $producto->video = $nombrevideo;

            $producto->save();
            return redirect()->route('admin.productos.index');
        
        }catch(\Exception $e){
            return back()->withErrors(array('message'=>$e->getMessage()));
        }
    }

}
