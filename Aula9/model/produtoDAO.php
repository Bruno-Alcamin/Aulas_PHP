<?php

class ProdutoDAO{
    public function insert(Produto $p){
        $mysqli = new mysqli("127.0.0.1", "bruno_alcamin", "", "Teste");
        if ($mysqli->connect_errno) {
            echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $stmt = $mysqli->prepare("INSERT INTO Produto(nm_produto,vl_produto) VALUES (?,?)");
        $stmt->bind_param("sd",$p->getNome(),$p->getValor());
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $stmt = $mysqli->prepare("SELECT * FROM Produto order by cd_Produto DESC LIMIT 1");
        $stmt->execute();
        $stmt->bind_result($id,$nome,$valor);
        $stmt->fetch();
        $stmt->close();
        $prod = new Produto($id,$nome,$valor);
        return $prod;
    }
    
    public function getProduct(){
        $mysqli = new mysqli("127.0.0.1", "bruno_alcamin", "", "Teste");
        $stmt = $mysqli->query("SELECT * FROM Produto");
        //$dados = [];
        $prod = [];
        for ($count=0; $row = $stmt->fetch_assoc(); $count++){
            //$dados[$count] = $row;
            $prod[$count] = new Produto($row['cd_Produto'],$row['nm_Produto'],$row['vl_Produto']);
            //var_dump($dados[0]['cd_Produto'].$dados[0]['nm_Produto'].$dados[0]['vl_Produto']);
        }
        return $prod;
    }
    
    public function deletar($x){
        $mysqli = new mysqli("127.0.0.1", "bruno_alcamin", "", "Teste");
        $stmt = $mysqli->prepare("DELETE FROM Produto where cd_Produto = ?");
        $stmt->bind_param("i",$x);
        $stmt->execute();
    }
}

?>