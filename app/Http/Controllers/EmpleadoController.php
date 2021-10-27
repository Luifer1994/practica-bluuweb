<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //con esto le decimos a laravel que usaremos bootstrap para el diseño de la paginacion ya que laravel 8 usa por defecto taillwin
        Paginator::useBootstrap();

        $empleados = Empleado::paginate(5);

        return view('empleado.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //VALIDAMOS QUE LOS DATOS QUE LLEGAN DEL FORMULARIO NO ESTEN VACIOS
         $request->validate([
            'nombre' => 'required|string',
            'apellido_paterno' => 'required|string',
            'apellido_materno' => 'required|string',
            'correo' => 'required|email|unique:empleados,correo',
            'foto' => 'required|image',
        ]);
        $newEmpleado = new Empleado();
        $newEmpleado->nombre = $request->nombre;
        $newEmpleado->apellido_paterno = $request->apellido_paterno;
        $newEmpleado->apellido_materno = $request->apellido_materno;
        $newEmpleado->correo = $request->correo;

        if($request->hasFile('foto')){
            $newEmpleado->foto = $request->file('foto')->store('uploads', 'public');
        }
        $newEmpleado->save();
        //lo devolvemos al index y le mandamos un mensaje con el metodo with
        return  redirect()->route('empleado.index')->with('message', 'Registro exitoso');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)//se instancia el empleado directamente con el parametro enviado
    {
        //retornamos la vista edit y le enviamos el pasamos por compact el empleado instanciado
        return view("empleado.edit", compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
         //VALIDAMOS QUE LOS DATOS QUE LLEGAN DEL FORMULARIO NO ESTEN VACIOS
         $request->validate([
            'nombre' => 'required|string',
            'apellido_paterno' => 'required|string',
            'apellido_materno' => 'required|string',
            'correo' => 'required|email|unique:empleados,correo,'.$empleado->id.',id' //validamos que sea unico exepto en el mismo empleado
        ]);
        //SI MANDAMOS UNA NUEVA IMAGEN BORRAMOS LA GUARDADA Y LE AGREGAMOS LA NUEVA
        if ($request->foto) {
            unlink(storage_path('app/public/'.$empleado->foto));
            $empleado->foto = $request->file('foto')->store('uploads', 'public');
        }
        $empleado->nombre = $request->nombre;
        $empleado->apellido_paterno = $request->apellido_paterno;
        $empleado->apellido_materno = $request->apellido_materno;
        $empleado->correo = $request->correo;
        $empleado->update();
        //lo devolvemos al index y le mandamos un mensaje con el metodo with
        return  redirect()->route('empleado.index')->with('message', 'Registro actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)//se instancia el empleado directamente con el parametro enviado
    {
        $empleado->delete();
        //retornamos a la vista anterior y mandamos un mensaje
        return  back()->with('message', 'Registro eliminado con exito');
    }
}
