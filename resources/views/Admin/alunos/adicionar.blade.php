@extends ('layout.site')
@section ('titulo','Alunos')
@section ('conteudo')
    <div class="container">
        <h3 class="center">Adicionar alunos</h3>
        <div class="row">
            <form class="" action="{{route('admin.alunos.salvar')}}" method="post" enctype="multipart/form-data">
                @csrf
                @include('admin.alunos._form', ['cursos' => $cursos])
                <button class="btn deep-orange">Salvar</button>
            </form>
        </div>
    </div>
@endsection