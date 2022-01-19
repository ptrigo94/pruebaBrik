<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

/**
 * Class TareaController
 * @package App\Http\Controllers
 */
class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        return Tarea::paginate();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $tarea = new Tarea();
        return view('tarea.create', compact('tarea'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tarea = new Tarea();
        $tarea->desc_tarea = $request->input('desc_tarea');
        $tarea->fecha_creacion = $request->input('fecha_creacion');
        $tarea->fecha_expiracion = $request->input('fecha_expiracion');
        $tarea->estado_tarea = $request->input('estado_tarea');
        $tarea->id_usuario = $request->input('id_usuario');
        $tarea->save();
        return json_encode( ['msg'=>'Creado!']);


        
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        return Tarea::find($id);
    }

    public function getByUserID($usuario_id)
    {
       
        
        
        return Tarea::where('id_usuario',$usuario_id)->paginate();
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$request)
    {
        
        $tarea = Tarea::find($id);
        $estado_tarea= $request->input('estado_tarea');
        Tarea::where('id',$tarea->id)->update(['estado_tarea'=>$estado_tarea]);
        return json_encode( ['msg'=>'Editado!']);    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tarea $tarea
     * @return \Illuminate\Http\Response
     */
    /*
    public function EditarDesc_tarea(Request $request, $id)
    {
        $tarea = Tarea::find($id);
        $desc_tarea= $request->input('desc_tarea');
        Tarea::where('id',$tarea->id)->update(['desc_tarea'=>$desc_tarea]);
        return json_encode( ['msg'=>'Editado!']);    
    } */
    public function update(Request $request, $id)
    {
        $tarea = Tarea::find($id);
        $estado_tarea= $request->input('estado_tarea');
        Tarea::where('id',$tarea->id)->update(['estado_tarea'=>$estado_tarea]);
        return json_encode( ['msg'=>'Editado!']);    
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        Tarea::destroy($id);
        return json_encode( ['msg'=>'Borrado!']);        
    }
}
