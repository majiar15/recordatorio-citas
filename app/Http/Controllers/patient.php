<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreatePatient;
use App\Models\Patient as modelPatient;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;


class patient extends Controller
{
    public function constructor() {
        
    }
    public function index(Request $request) {
        $patients = modelPatient::all();
        return view('dashboard',['patients' => $patients]);
    }
    public function store(PostCreatePatient $request)
    {
      
        $request->validated();
        $date = getdate();
        if($date["mon"] == 12){
            $prox_cita = $date["mday"].'/1'.'/'.$date["year"]+1;

        }else{
            $newMon = $date["mon"]+1;
            $prox_cita = $date["mday"].'/'.$newMon.'/'.$date["year"];
        }
        $patient = modelPatient::create([
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
        $patient = modelPatient::find($request->id);
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
        $patient = modelPatient::where('cc',$request->cc)->first();
        $patient->cc = $request->cc;
        $patient->name = $request->name;
        $patient->last_name = $request->last_name;
        $patient->email = $request->email;
        $patient->number = $request->number;
        
        $patient->save();
        return redirect()->route('editPatient', ['id' => $patient->id])->with('message', 'Paciente Actualizado correctamente');

    }
}
