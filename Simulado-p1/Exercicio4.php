<?php
/*
4) Adminstrador, Grupo e Comum são Usuarios em um sistema.
Sabe-se que um Administrador possui permissão para adicionar,
modificar, pesquisar e deletar. Os Usuarios de Grupo podem
adicionar, modificar e pesquisar. Os Usuarios Comuns podem
apenas pesquisar. Cada ação representa apenas um echo na
página para facilitar. Desenhe um diagrama de classes
e implemente as classes usando o máximo dos conceitos de 
Programação Orientada a Objetos.
*/
interface UsuarioAM{
    
    function adicionar();
    
    function modificar();

}

interface UsuarioP{
    
    function pesquisar();
    
}

interface UsuarioD{
    
    function deletar();
}

class Grupo implements UsuarioAM, UsuarioP{
    
    public function adicionar(){
        echo "Adcionou";
    }
    
    public function modificar(){
        echo "Modificou";
    }
    
    public function pesquisar(){
        echo "Pesquisou";
    }
}

class Comum implements UsuarioP{
    
    public function pesquisar(){
        echo "Pesquisou";
    }
}

class Administrador implements UsuarioAM, UsuarioP, UsuarioD{
    
    public function adicionar(){
        echo "Adcionou";
    }
    
    public function modificar(){
        echo "Modificou";
    }
    
    public function pesquisar(){
        echo "Pesquisou";
    }
    
    public function deletar(){
        echo "Deletou";
    }
}
echo "Comum";
echo "<br>";
$c = new Comum();
$c->pesquisar();
echo "<br>";
echo "Administrador";
echo "<br>";
$a = new Administrador();
$a->adicionar();
$a->deletar();
$a->modificar();
$a->pesquisar();
echo "<br>";
echo "Grupo";
echo "<br>";
$g = new Grupo();
$g->adicionar();
$g->modificar();
$g->pesquisar();
?>