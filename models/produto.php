<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Models;
use Lib\Model;
use Lib\DB;
/**
 * Description of Produto
 *
 * @author Ga_Ca
 */
class Produto extends Model{
    //put your code here
    private $idProduto;
    private $nome;
    private $valor;
    private $descricao;
    private $disponivel;
    
    function __construct($idProduto, $nome, $valor, $descricao, $disponivel) {
        $this->idProduto = $idProduto;
        $this->nome = $nome;
        $this->valor = $valor;
        $this->descricao = $descricao;
        $this->disponivel = $disponivel;
    }

    function getIdProduto() {
        return $this->idProduto;
    }

    function getNome() {
        return $this->nome;
    }

    function getValor() {
        return $this->valor;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getDisponivel() {
        return $this->disponivel;
    }

    function setIdProduto($idProduto) {
        $this->idProduto = $idProduto;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setDisponivel($disponivel) {
        $this->disponivel = $disponivel;
    }

        
    
    public static function getProdutos($apenasDisponivel = false){
        $conn= DB::getConnection();
        
        
        if($apenasDisponivel == FALSE){
            $query = 'select `idProduto`,`nome`,`valor`,`descricao`,`disponivel` from produto';

        }else{
            $query = 'select `idProduto`,`nome`,`valor`,`descricao`,`disponivel` from produto where `disponivel`=1';
        }
        $result = $conn->query($query);
        if($result == false){
            throw new \Exception("falha ao carregar a lista de produtos.Erro:{$conn->error}");
        }
        $produtos=[];
        while($row =$result->fetch_assoc()){
            $produtos[]=new Produto($row['idProduto'],$row['nome'],$row['valor'],$row['descricao'],$row['disponivel']);
        
        }
        $result->close();
        return $produtos;
    }
    
    public static function getProdutosPorId($idProduto){
        $conn= DB::getConnection();        
         $query = 'select `idProduto`,`nome`,`valor`,`descricao`,`disponivel` from produto where `idProduto`=?';
        $stmt=$conn->prepare($query);
        if($stmt === false){
            throw new \Exception("Falha ao preparar query.Erro:{$conn->error}");
        }
       if( $stmt->bind_param('i',$idProduto)=== false){
           throw new \Exception("Falha ao associar parametros.Erro:{$stmt->error}");
       }
        if($stmt->execute()=== false){
            throw new \Exception("Falha ao executar query.Erro:{$stmt->error}");
        }
        
       $result = $stmt->get_result();
        if($row =$result->fetch_assoc()){
            $produto=new Produto($row['idProduto'],$row['nome'],$row['valor'],$row['descricao'],$row['disponivel']);
        }else{
            $produto=null;
        }
        $result->close();
        $stmt->close();        
        return $produto;
    }
    /*
     * @param Produto $produto
     * @return
     * @throws /Exception
     */
    
    public static function insere($produto){
        $conn= DB::getConnection();
        $query ='Insert into `produto`(`nome`,`valor`,`descricao`,`disponivel`) values(?,?,?,?)';
        $stmt=$conn->prepare($query);
        if($stmt === false){
            throw new \Exception("Falha ao preparar query.Erro:{$conn->error}");
        }
         $nome=$produto->getNome();
         $valor=$produto->getValor();
         $descricao=$produto->getDescricao();
         $disponivel=$produto->getDisponivel();
        if( $stmt->bind_param('sdsi',$nome,$valor,$descricao,$disponivel)=== false){
           throw new \Exception("Falha ao associar parametros.Erro:{$stmt->error}");
       }
        if($stmt->execute()=== false){
            throw new \Exception("Falha ao executar query.Erro:{$stmt->error}");
        }
       
        $stmt->close();  
        
        
    }
    
     public static function atualizar($produto){
        $conn= DB::getConnection();
        $query ='Update `produto` SET nome=?,valor=?,descricao=?,disponivel=? WHERE idProduto=?';
        $stmt=$conn->prepare($query);
        if($stmt === false){
            throw new \Exception("Falha ao preparar query.Erro:{$conn->error}");
        }
        $idProduto=$produto->getIdProduto();
         $nome=$produto->getNome();
         $valor=$produto->getValor();
         $descricao=$produto->getDescricao();
         $disponivel=$produto->getDisponivel();
        if( $stmt->bind_param('sdsii',$nome,$valor,$descricao,$disponivel,$idProduto)=== false){
           throw new \Exception("Falha ao associar parametros.Erro:{$stmt->error}");
       }
        if($stmt->execute()=== false){
            throw new \Exception("Falha ao executar query.Erro:{$stmt->error}");
        }
       
        $stmt->close();  
        
        
    }
    
    public static function excluir($idProduto){
        $conn= DB::getConnection();
        $query ='DELETE FROM  `produto` WHERE idProduto=?';
        $stmt=$conn->prepare($query);
        if($stmt === false){
            throw new \Exception("Falha ao preparar query.Erro:{$conn->error}");
        }
       
        
        if( $stmt->bind_param('i',$idProduto)=== false){
           throw new \Exception("Falha ao associar parametros.Erro:{$stmt->error}");
       }
        if($stmt->execute()=== false){
            throw new \Exception("Falha ao executar query.Erro:{$stmt->error}");
        }
       
        $stmt->close();  
        
        
    }
    




}
