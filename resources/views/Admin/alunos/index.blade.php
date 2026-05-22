@extends('layout.site')

@section('titulo','Alunos')

@section('conteudo')

<div class='container'>
 <h3 class='center'>Lista de Alunos</h3>
    <div class='row'>
        <table>
            <thead>
                <tr>  
                    <td>Id</td><td>Titulo</td><td>Descrição</td>
                    <td>Publicado</td><td>Valor</td>
                    <td>Imagem</td>
                    <td>Ação</td>
                </tr>
            </thead>
            <tbody>
            @foreach($rows as $row)   
                <tr>
                    <td>{{ $row->id }}</td><td>{{ $row->titulo }}</td><td>{{ $row->descricao }}</td>
                    <td>{{ $row->publicado }}</td><td>{{ $row->valor }}</td>
                    <td><img width="120" src="{{ asset($row->imagem) }}" alt="{{ $row->titulo }}"></td>
                    <td>  
                        <a class='btn deep-orange' href="{{ route('admin.alunos.editar',$row->id) }}">Alterar</a>
                        <a class='btn rede' href="{{ route('admin.alunos.excluir',$row->id) }}">Excluir</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>   
    </div>
    <div class='row'>  
        <a class='btn blue' href="{{ route('admin.alunos.adicionar')}}">Adicionar</a>
    </div>
</div>

@endsection