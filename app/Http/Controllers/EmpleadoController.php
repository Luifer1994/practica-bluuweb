<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $datos['empleados']= Empleado::paginate(5);

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

        return  redirect()->route('empleado.index')->with('message', 'Registro exitoso');

        // obligas a que el orden de lo inputs (name) sea igual a la base de datos
        // $datosEmpleado = request()->except('_token');
        // Empleado::insert($datosEmpleado);
        // return $request;


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
    public function edit(Empleado $empleado)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return  redirect()->route('empleado.index')->with('message', 'Registro eliminado con exito');;
    }
}
