<?php

namespace App\Http\Controllers;

use App\Models\Cirugy;
use App\Models\Patient;
use App\Models\User;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator,  Illuminate\Support\Str;



class CirugiasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cirugias = Cirugy::with("patient","user")->paginate(25);
        return view('cirugies.index')->with('cirugias',$cirugias);
    }
    public function edit($id){
        $cirugia = Cirugy::where('id',$id)->first();
        return view('cirugies.edit')->with('cirugia',$cirugia);
    }

    public function postEdit(Request $request, $id){

        $rules = [
            'dateline' => 'required',
            'paciente' => 'required',
            'doctor' => 'required',
            'type' => 'required',
            'comments' => 'required'

        ];

        $messages =[
            'dateline.required' => 'la fecha es requerida.',
            'paciente.required' => 'Seleccione un paciente',
            'doctor.required' => 'Seleccione un doctor.',
            'type.required' => 'Ingrese un tipo de cirugia.',
            'comments.required' => 'ingrese una descripcion.'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) : 
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput();
        else:
            // dd($request);
            //crea una carpeta con la fecha de subida de la imagen


            $cirugy = Cirugy::findOrFail($id);
            // dd($cirugy);
            $cirugy->id_patient= $request->input('paciente');
            $cirugy->id_doctor = $request->input('doctor');
            $cirugy->dateline = $request->input('dateline');
            $cirugy->type = e($request->input('type'));
            $cirugy->comments = e($request->input('comments'));
          

            if($cirugy->save()):
              
                return back()->with('message','Guardado con exito.')->with('typealert','success');
            
            endif;
        endif;
    }

    public function delete($id){
        $c = Cirugy::findOrFail($id);
        if ($c->delete()) {
           
            return back()->with('message','Cirugia Eliminada')->with('typealert','success');
        }
    }

    public function show(){
        $doctores = User::all();
        $pacientes = Patient::all();
        return view('cirugies.create')->with('doctores',$doctores)->with('pacientes',$pacientes);
    }

    public function detalle($id){
        $cirugia = Cirugy::where('id',$id)->first();
       
        return view('cirugies.detail')->with('cirugia',$cirugia);
    }


    public function postCirugiasAdd(Request $request){
        $rules = [
            'dateline' => 'required',
            'paciente' => 'required',
            'doctor' => 'required',
            'type' => 'required',
            'comments' => 'required'

        ];

        $messages =[
            'dateline.required' => 'la fecha es requerida.',
            'paciente.required' => 'Seleccione un paciente',
            'doctor.required' => 'Seleccione un doctor.',
            'type.required' => 'Ingrese un tipo de cirugia.',
            'comments.required' => 'ingrese una descripcion.'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) : 
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput();
        else:
            // dd($request);
            //crea una carpeta con la fecha de subida de la imagen


            $cirugy = new Cirugy;
            $cirugy->id_patient= $request->input('paciente');
            $cirugy->id_doctor = $request->input('doctor');
            $cirugy->dateline = $request->input('dateline');
            $cirugy->type = e($request->input('type'));
            $cirugy->comments = e($request->input('comments'));
          

            if($cirugy->save()):
              
                return redirect('/cirugias/add')->with('message','Guardado con exito.')->with('typealert','success');
            
            endif;
        endif;
    }

}
