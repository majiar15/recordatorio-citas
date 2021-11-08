<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreatePatient;
use App\Models\Patient as ModelPatient;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;


class patient extends Controller
{
    public function constructor() {
        
    }
    public function index(Request $request) {
        $patients = ModelPatient::paginate(9);
        return view('dashboard',['patients' => $patients]);
    }
    public function store(PostCreatePatient $request)
    {
      
        $request->validated();
        $prox_cita  =date("y-m-d", mktime(0, 0, 0, date("m")+1, date("d"),   date("Y")));
        
        $patient = ModelPatient::create([
            'cc' => $request->cc,
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'number' => $request->number,
            'proxima_cita' => $prox_cita
            
        ]);
        return redirect()->route('newPatient')->with('message', 'Paciente creado correctamente');
        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
            
        // ]);

        // event(new Registered($user));

        // Auth::login($user);
    }
    public function edit (Request $request){
        $request->validate([
            'id' => 'required'
        ]);
        $patient = ModelPatient::find($request->id);
        return view('editPatient',[
            'patient' => true,
            'cc' => $patient->cc,
            'name' => $patient->name,
            'last_name' => $patient->last_name,
            'email' => $patient->email,
            'number' => $patient->number
        ]);
    }
    public function update (Request $request){
        $request->validate([
            'cc' => 'required',
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'number' => 'required',
        ]);
        $patient = ModelPatient::where('cc',$request->cc)->first();
        $patient->cc = $request->cc;
        $patient->name = $request->name;
        $patient->last_name = $request->last_name;
        $patient->email = $request->email;
        $patient->number = $request->number;
        
        $patient->save();
        return redirect()->route('editPatient', ['id' => $patient->id])->with('message', 'Paciente Actualizado correctamente');

    }
    public function destroy(Request  $request) {

        $patient = ModelPatient::find($request->id)->first();
        $patient->delete();

        return redirect()->route('dashboard')->with('message', 'Paciente Eliminado');

    }
 
}
