<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Agenda;

use App\Http\Requests\AgendaRequest;

class AgendaController extends Controller
{

    public function cadastrar(AgendaRequest $request){
        $nome = $request->input('nome');
        $telefone = $request->input('telefone');
        $email = $request->input('email');


        $agenda = new Agenda();
        $agenda->nome = $nome;
        $agenda->telefone = $telefone ;
        $agenda->email= $email;
        $agenda->save();

        return response()->json([
            "data"    => $agenda
        ],201);

    }

    public function listar(){
        $lista = Agenda::all();

        return response()->json([
            "data"    => $lista
        ],200);


    }


    public function show($id){
        $agenda = Agenda::find($id);

        return response()->json([
            "data"    => $agenda
        ],200);

    }

    public function delete($id){
        $agenda = Agenda::find($id);
        $agenda->delete();

        return response()->json([
            "agenda deletada com sucesso"
        ],200);

    }

    public function atualizar($id,AgendaRequest $request) {
        $nome = $request->input('nome');
        $telefone = $request->input('telefone');
        $email = $request->input('email');

        $agenda = Agenda::find($id);

        if(!$agenda){
            return response()->json([
                "Registro não encontrado."
            ],200);
        }

        $agenda->nome = $nome;
        $agenda->telefone = $telefone ;
        $agenda->email= $email;
        $agenda->save();


        return response()->json([
            "data"    => $agenda
        ],200);

    }
   

    // public function exemplo(Request $request)
    // {

    //     $nome = $request->input('nome');
    //     $telefone = $request->input('telefone');

    //     $contato = new Agenda();
    //     $contato->nome = $nome;
    //     $contato->telefone = $telefone;
    //     $contato->save();

    //     return response()->json([
    //         "data"    => $contato
    //     ],201);

    // }


}
