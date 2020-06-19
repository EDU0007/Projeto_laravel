
@extends('layout')

@section('cabecalho')
    Adicionar Tarefas <br>
    <a href="/series" class="btn btn-secondary">voltar ao inicio</a>
@endsection

@section('conteudo')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form method="post">
        @csrf
      
        

        <div class="row d-flex">
            <div class="col col-8">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome">
            </div>

            <div class="col col-2">
                <label for="nome">N Tarefas</label>
                <input type="number" class="form-control" name="qtd_temporadas" id="nome">
            </div>
            
            <div class="col col-2">
                <label for="nome"> N Dias</label>
                <input type="number" class="form-control" name="ep_por_temporada" id="nome">
            </div>
          
        </div>
        <button class="btn btn-primary mt-4">Adicionar</button>

    </form>
@endsection
