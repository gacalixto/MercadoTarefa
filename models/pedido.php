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
 * Description of Pedido
 *
 * @author Ga_Ca
 */
class Pedido extends Model{
    private $idPedido;
    private $nome;
    private $endereco;
    private $quantidade;
    /*
     * @var Produto
     * 
     */
    private $produto;
   

       

       

        
    public static function getPedidos(){
        $conn= DB::getConnection();   
        
        
        $query = 'select `idPedido`,`nome`,`endereco`,`quantidade`,`Produto_idProduto` from pedido';
        $result = $conn->query($query);
        if($result == false){
            throw new \Exception("falha ao carregar a lista de pedidos.Erro:{$conn->error}");
        }
        $pedidos=[];
        while($row =$result->fetch_assoc()){
            $pedidos[]=new Pedido($row['idPedido'],$row['nome'],$row['endereco'],$row['quantidade'], Produto::getProdutosPorId($row['Produto_idProduto']));
        
        }
        $result->close();
        return $pedidos;
    }
    
    public static function getPedidosPorId($idPedido){
        $conn= DB::getConnection();        
         $query = 'select `idPedido`,`nome`,`endereco`,`quantidade`,`Produto_idProduto` from pedido where `idPedido`=?';
        $stmt=$conn->prepare($query);
        if($stmt === false){
            throw new \Exception("Falha ao preparar query.Erro:{$conn->error}");
        }
       if( $stmt->bind_param('i',$idPedido)=== false){
           throw new \Exception("Falha ao associar parametros.Erro:{$stmt->error}");
       }
        if($stmt->execute()=== false){
            throw new \Exception("Falha ao executar query.Erro:{$stmt->error}");
        }
        
       $result = $stmt->get_result();
        if($row =$result->fetch_assoc()){
            $pedido=new Pedido($row['idPedido'],$row['nome'],$row['endereco'],$row['quantidade'], Produto::getProdutosPorId($row['Produto_idProduto']));
        }else{
            $pedido=null;
        }
        $result->close();
        $stmt->close();
        
        return $pedido;
    }
    /*
     * @param Produto $produto
     * @return
     * @throws /Exception
     */
    
    public static function insere($pedido){
        $conn= DB::getConnection();
        $query ='Insert into `pedido`(`nome`,`endereco`,`quantidade`,`Produto_idProduto`) values(?,?,?,?)';
        $stmt=$conn->prepare($query);
        if($stmt === false){
            throw new \Exception("Falha ao preparar query.Erro:{$conn->error}");
        }
         $nome=$pedido->getNome();
         $endereco=$pedido->getEndereco();
         $quantidade=$pedido->getQuantidade();
         $produto=$pedido->getProduto()->getIdProduto();
         
        if( $stmt->bind_param('ssii',$nome,$endereco,$quantidade,$produto)== false){
           throw new \Exception("Falha ao associar parametros.Erro:{$stmt->error}");
       }
        if($stmt->execute()=== false){
            throw new \Exception("Falha ao executar query.Erro:{$stmt->error}");
        }
        
        $stmt->close();        
        
    }
    
     public static function atualizar($pedido){
        $conn= DB::getConnection();
        $query ='Update `pedido` SET nome=?,endereco=?,quantidade=?,Produto_idProduto=? WHERE idPedido=?';
        $stmt=$conn->prepare($query);
        if($stmt === false){
            throw new \Exception("Falha ao preparar query.Erro:{$conn->error}");
        }
        $idPedido=$pedido->getIdPedido();
        $nome=$pedido->getNome();
         $endereco=$pedido->getEndereco();
         $quantidade=$pedido->getQuantidade();
         $idProduto=$pedido->getProduto()->getIdProduto();
        if( $stmt->bind_param('ssiii',$nome,$endereco,$quantidade,$idProduto,$idPedido)=== false){
           throw new \Exception("Falha ao associar parametros.Erro:{$stmt->error}");
       }
        if($stmt->execute()=== false){
            throw new \Exception("Falha ao executar query.Erro:{$stmt->error}");
        }
       
        $stmt->close();  
        
        
    }
    public static function excluir($idPedido){
        $conn= DB::getConnection();
        $query ='DELETE FROM  `pedido` WHERE idPedido=?';
        $stmt=$conn->prepare($query);
        if($stmt === false){
            throw new \Exception("Falha ao preparar query.Erro:{$conn->error}");
        }
       
        
        if( $stmt->bind_param('i',$idPedido)=== false){
           throw new \Exception("Falha ao associar parametros.Erro:{$stmt->error}");
       }
        if($stmt->execute()=== false){
            throw new \Exception("Falha ao executar query.Erro:{$stmt->error}");
        }
       
        $stmt->close();  
        
        
    }
    
    
    
    function getIdPedido() {
        return $this->idPedido;
    }

    function getNome() {
        return $this->nome;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getQuantidade() {
        return $this->quantidade;
    }

    function setIdPedido($idPedido) {
        $this->idPedido = $idPedido;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }
    /*
     * @return Produto
     */
      function getProduto() {
        return $this->produto;
    }

    function setProduto($produto) {
        $this->produto = $produto;
    }
    

  
    function __construct($idPedido, $nome, $endereco, $quantidade,$produto) {
        $this->idPedido = $idPedido;
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->quantidade = $quantidade;
        $this->produto=$produto;
        
    }


}
