<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\Custo;
use Illuminate\Http\Request;

class CustoController extends Controller
{
    public function __construct(Custo $custo){
        $this->custo = $custo;
    }
    
    public function index(){
        $title = 'Listagem de Custos';
        $custos = $this->custo->all();
        return view('custos.index', compact('title', 'custos'));
    }

    public function create(){
        $title = 'Cadastrar Novo Custo';
        return view('custos.create-edit', compact('title'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        //dd($request->only(['name', 'number']));
        //dd($request->except(['name', 'number']));
        //dd($request->input('name'));

        //Pega todos os dados inseridos no formulario
        $dataForm = $request->all();

        //Validação
        //$this->validate($request, $this->custo->rules);

        //Faz o cadastro de fato no banco de dados
        $insert = $this->custo->create($dataForm);


        if($insert)
            return redirect()->route('custos.index');
        else
            return redirect()->route('custos.create');

    }

    public function edit($id){

        //Rescupera custo pelo id
        $custo = $this->custo->find($id);

        $title = "Editar Custo: {$custo->description}";

        return view('custos.create-edit', compact('title', 'custo'));
    }

    public function update(Request $request, $id){
        $dataForm = $request->all();
        $custo = $this->custo->find($id);
        $update = $custo->update($dataForm);
        if( $update )
            return redirect()->route('custos.index');
        else
            return redirect()->route('custos.edit', $id)->with(['errors'=>"Falha ao Editar"]);
    }
}
