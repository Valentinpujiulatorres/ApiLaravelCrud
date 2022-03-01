### Documentacion Laravel Crud API

https://www.youtube.com/watch?v=fNoCoog32yw&list=PLRheCL1cXHrv5luFoIYNjgR8fELy9nW46&index=5&ab_channel=FundaOfWebIT



Una Api consiste en la centalizacion de recursos a distribuir mediante endpoints , en este caso queremos implementar una api en el framework Laravel .
Autor : Valentin Pujiula Torres

---
##### Documentacion

Para comenzar , crearemos el modelo junto a su migracion de tal manera :

`php artisan make:model Product -mc`

Una vez creado el modelo y correspondiente migracion deberemos agregar los campos necesarios en nuestra **Tabla**  de la base de datos , este lo encontraremos en :
>database/migrations/

A continuacion agregamos el uso del controlador en `api.php` tal que :

>use NameController

Creamos la Route pretinente:

`Route::post('product/add' , [ProductController::class,'store'])`

a continuacion crearemos la funcion publica **Store** en nuestro controlador :

- store

`   public function store(Request $request){

        $request->validate([
            'name'=>'required|max:191',
            'description'=>'required',
            'price'=>'required',
            'qty'=>'required',
        ]);

        $product = new Products();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->save();

        return response()->json(['message'=>'Element Added Succesfully'], 200);

    }`

Despues seguiremos con 

- index()
` public function index(){

        $products = Products::all();
        return response()->json(['products'=>$products], 200);
        }
`
- show()

    
        public function show($id){

        $products = Products::find($id);
        if($products){

            return response()->json(['products'=>$products], 200);

        }else{
            return response()->json(['products'=>'No record finded'], 404);
        }
        
        }
    
- edit()
- delete()



Finalizado este punto debermos agregar a api.php::

Al acabar podemos comprobar su funcionalidad mediante postman :


    >encontraremos todos los recursos descendiendo /api 

` EJ: http://127.0.0.1:8000/api/products`

Para visualizar el contenido en ficheros blade haremos lo siguiente :

>Crear script en : public/js/script.js

Una vez allo debermos asegurarnos que las rutas a los endpoints son correctas  e implementar Create/delete
