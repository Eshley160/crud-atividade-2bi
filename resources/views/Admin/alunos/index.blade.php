@extends('layout.site')

@section('titulo','Alunos')

@section('conteudo')

<div class='container'>
 <h3 class='center'>Lista de Alunos</h3>
    <div class='row'>
        <table>
            <thead>
                <tr>  <!-- CABECALHO -->
                    <td>Id</td><td>Nome</td><td>Celular</td>
                    <td>Imagem</td><td>Curso</td>
                    <td>Ação</td>
                </tr>
            </thead>
            <tbody>
            @foreach($rows as $row)   <!-- LOOP PRA LER A TABELA -->
                <tr>
                    <td>{{ $row->id }}</td><td>{{ $row->nome }}</td><td>{{ $row->celular }}</td>
                    <td><img width="120" src="{{ asset($row->imagem) }}" alt="{{ $row->nome }}"></td>
                    <td>{{ $row->id_curso }}</td>
                    <td>   <!-- COLUNA COM ALTERAR E EXCLUIR -->
                        <a class='btn deep-orange' href="{{ route('admin.alunos.editar',$row->id) }}">Alterar</a>
                        <a class='btn rede' href="{{ route('admin.alunos.excluir',$row->id) }}">Excluir</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>   
    </div>
    <div class='row'>  <!-- BOTAO ADICIONAR -->
        <a class='btn blue' href="{{ route('admin.alunos.adicionar')}}">Adicionar</a>
    </div>
</div>

@endsection