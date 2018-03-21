<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
use App\Turno;
use App\Departamento;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *  
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::paginate();

        return view('empleados.index',['empleados'=>$empleados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       // echo 'Hola Esto es Crear un Empleado';
        $empleado = new Empleado();
        $sexo = array ( 'HOMBRE' => 'HOMBRE',
                        'MUJER' => 'MUJER');
        //$turnos = Turno::all();
         $turnos = Turno::all()->pluck('descripcion','id');
         $deptos = Departamento::all()->pluck('descripcion','id');
        return view('empleados.create2', ['empleado'=>$empleado,
                                            'sexos' =>$sexo,
                                            'turnos' =>$turnos,
                                            'departamentos' => $deptos]
                                        );
       // return View('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       // dd($request->toArray());
       // dd($request->all());

        $validatedData = $request->validate([
            'matricula' => 'required|unique:empleados|min:3|max:4',
            'paterno' => 'required',
            'materno' => 'required',
            'fecha_nacimiento' => 'required',

        ]);

        //$empleado->matricula = $request->input('matricula'); //para guardar de uno en uno
        $empleado = new Empleado($request->all()); 
        $empleado->save();

        if ($empleado){
            echo "Los datos se guardaron correctamente";
        }else
        {
            echo "Los datos No se guardaron";
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $empleado = Empleado::find($id);
         $sexo = array ( 'HOMBRE' => 'HOMBRE',
                        'MUJER' => 'MUJER');
        //$turnos = Turno::all();
         $turnos = Turno::all()->pluck('descripcion','id');
         $deptos = Departamento::all()->pluck('descripcion','id');
        return view('empleados.edit',compact('empleado','sexo','turnos','deptos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
       $empleado = Empleado::find($id);
       //  $empleado = $request->all(); 
        // dd($empleado);
       $empleado->matricula=$request->input('matricula');

      $empleado->nombre=$request->input('nombre');

      $empleado->paterno=$request->input('paterno');

      $empleado->materno=$request->input('materno');

      $empleado->fecha_nacimiento=$request->input('fecha_nacimiento');

      $empleado->sexo=$request->input('sexo');

      $empleado->id_turno=$request->input('id_turno');

      $empleado->id_departamento=$request->input('id_departamento');
        
      $empleado->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $empleado = Empleado::find($id);

        $empleado->delete();

        return $this->index();
    }
}
