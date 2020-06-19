<?php


namespace App\Http\Controllers;

use App\Episodio;
use App\Http\Requests\Tarefasformrequest;
use App\Serie;
use App\Services\Creiador;
use App\Services\Removedor;
use App\temporada;
use Illuminate\Http\Request;

class SeriesController extends controller
{
 public function index(Request $request){
    $series = Serie::query()->orderBy('nome')->get();
   $mensagem = $request->session()->get('mensagem');
   $request->session()->remove('mensagem');

  return view('series.index', compact('series','mensagem'));
 }

    public function create()
    {
        return view('series.create');
    }

    public function store(Tarefasformrequest $request, Creiador $creiador)
    {
        $serie = $creiador->creiaSerie(
            $request->nome,
            $request->qtd_temporadas,
            $request->ep_por_temporada
        );

        $request->session()->flash('mensagem',"Serie {$serie->id} criado com sucesso{$serie->nome}");

       return redirect()->route('listar_tarefas') ;
    }
    public function destroy(Request $request,Removedor $removedor)
    {
        $nomeSerie = $removedor->remover($request->id);
        Serie::destroy($request->id);
        $request->session()->flash('mensagem','Tarefa removida com sucesso');

        return redirect()->route('listar_tarefas') ;
    }
    public function editaNome($id, Request $request)
    {

        $novoNome = $request->nome;
        $serie = Serie::find($id);
        $serie->nome = $novoNome;
        $serie->save();
    }

  }
