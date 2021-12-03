<x-app-layout title="Formulario producto"> 
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
           @if(isset($producto)) Actualizar producto @else Registrar nuevo producto @endif
        </h2>
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form  
            @if(isset($producto)) action="{{route('update.producto')}}" @else action="{{route('save.producto')}}" @endif
            method="POST"  enctype="multipart/form-data">
            @csrf
                <label class="block text-sm">
                    @if(isset($producto)) <input type="text" value="{{$producto->id}}" hidden name="id"> @endif
                    <span class="text-gray-700 dark:text-gray-400">Nombre</span>
                    <input name="name" @if(isset($producto)) value="{{$producto->name}}" @else value="{{old('name')}}" @endif
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Descripcion</span>
                    <input name="description" @if(isset($producto)) value="{{$producto->description}}" @else value="{{old('description')}}" @endif
                     class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Precio</span>
                    <input name="price" @if(isset($producto)) value="{{$producto->price}}" @else value="{{old('price')}}" @endif
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </label>  
               

               

                <div class="grid grid-cols-1 mt-5 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Sube la foto</label>
                    <div class='flex items-center justify-center w-full'>
                        <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                            <div class='flex flex-col items-center justify-center pt-7'>
                            <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <p class='lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>Selecciona tu imagen</p>
                            </div>
                            <input type='file' class="hidden" @if(isset($producto)) value="{{$producto->img}}" @else value="{{old('img')}}" @endif
                          id="img" name="img" />
                        </label>
                    </div>
                </div>

                <div class="grid grid-cols-1 mt-5 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Sube el gif</label>
                    <div class='flex items-center justify-center w-full'>
                        <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                            <div class='flex flex-col items-center justify-center pt-7'>
                            <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <p class='lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>Selecciona tu gif</p>
                            </div>
                            <input type='file' class="hidden" @if(isset($producto)) value="{{$producto->video}}" @else value="{{old('video')}}" @endif
                          id="video" name="video" />
                        </label>
                    </div>
                </div>
                 
                <input name="status" type="text" hidden value="1">
                <div class="pt-5">
                    <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Guardar
                    </buttton>
                </div>     
            </form>
            
        </div>
    </div>
</x-app-layout>