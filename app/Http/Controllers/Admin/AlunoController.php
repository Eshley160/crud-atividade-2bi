<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Curso;


class AlunoController extends Controller
{
    public function index(){
        $rows = Aluno::all(); //como um select * from cursos
        return view('admin.alunos.index', compact('rows'));
    }

    public function adicionar(){
        $cursos = Curso::all();
        return view('admin.alunos.adicionar', compact('cursos'));
    }
    
    public function editar($id){
        $row = Aluno::find($id);
        $cursos = Curso::all();
        return view('admin.alunos.editar', compact('row', 'cursos'));
    }

    public function excluir($id){
        Aluno::find($id)->delete();
        return redirect()->route('admin.alunos');
    }

    

    private function ajusteDados(Request $req){
        $dados = $req->all();
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
        Aluno::create($dados);
        return redirect()->route('admin.alunos');
    }

    public function atualizar(Request $req, $id)
    {
        $dados = $this->ajusteDados($req);
        Aluno::find($id)->update($dados);
        return redirect()->route('admin.alunos');
    }

    
}