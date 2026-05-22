<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aluno;

class AlunoController extends Controller
{
    public function index(){
        $rows = Aluno::all(); //como um select * from cursos
        return view('admin.alunos.index', compact('rows'));
    }

    public function adicionar(){
        return view('admin.alunos.adicionar');
    }

    public function editar($id){
        $row = Aluno::find($id);
        //carrega o registro (realiza select e um fetch internamente) e guarda na variável $row
        return view('admin.alunos.editar', compact('row'));
    }

    public function excluir($id){
        Aluno::find($id)->delete();
        // apos selecionar o registro, é chamado o método DELETE do OBJETO registro
        return redirect()->route('admin.alunos');
        //depois de excluir volta a listar os cursos
    }

    private function ajusteDados(Request $req){
        $dados = $req->except(['_token', '_method']);
        if(isset($dados['publicado'])){
            $dados['publicado'] = 'sim';
        }else{
            $dados['publicado'] = 'nao';
        }
        if($req->hasFile('arquivo')){
            $imagem = $req->file('arquivo');
            $num = rand(1111,9999);
            $dir = "img/alunos/";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "imagem_".$num.".".$ex;
            $imagem->move($dir,$nomeImagem);
            $dados['imagem'] = $dir."/".$nomeImagem;
        }
        return $dados;
    }

    public function salvar(Request $req)
    {
        $dados = $this->ajusteDados($req);
        Alunos::create($dados);
        return redirect()->route('admin.alunos');
    }

    public function atualizar(Request $req, $id)
    {
        $dados = $this->ajusteDados($req);
        Alunos::find($id)->update($dados);
        return redirect()->route('admin.alunos');
    }
}
