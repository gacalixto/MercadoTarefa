<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Models;
use Lib\DB;
use Lib\Model;

/**
 * Description of Funcionario
 *
 * @author Ga_Ca
 */
class Funcionario extends Model{
    private $idFuncionario;
    private $nome;
    private $usuario;
    private $senha;
    private $cargo;
    /*
     * param Funcionario $func
     * @return type
     * @throws \Exception
     */
    public static function insere($func){
        $conn= DB::getConnection();
        $query ='Insert into `funcionario`(`nome`,`usuario`,`senha`,`cargo`) values(?,?,?,?)';
        $stmt=$conn->prepare($query);
        if($stmt === false){
            throw new \Exception("Falha ao preparar query.Erro:{$conn->error}");
        }
         $nome=$func->getNome();
         $usuario=$func->getUsuario();
         $senha=$func->getSenha();
         $cargo=$func->getCargo();
        if( $stmt->bind_param('ssss',$nome,$usuario,$senha,$cargo)=== false){
           throw new \Exception("Falha ao associar parametros.Erro:{$stmt->error}");
       }
        if($stmt->execute()=== false){
            throw new \Exception("Falha ao executar query.Erro:{$stmt->error}");
        }
        $stmt->close();        
        
    }
    
    public static function getFuncionarios(){
        $conn= DB::getConnection();   
        
        
        $query = 'select `idFuncionario`,`nome`,`usuario`,`senha`,cargo from funcionario';
        $result = $conn->query($query);
        if($result == false){
            throw new \Exception("falha ao carregar a lista de funcionarios.Erro:{$conn->error}");
        }
        $funcionarios=[];
        while($row =$result->fetch_assoc()){
            $funcionarios[]=new Funcionario($row['idFuncionario'],$row['nome'],$row['usuario'],$row['senha'],$row['cargo']);
        
        }
        $result->close();
        return $funcionarios;
    }
    
    public static function getFuncionariosPorId($idFuncionario){
        $conn= DB::getConnection();        
         $query = 'select `idFuncionario`,`nome`,`usuario`,`senha`,cargo from funcionario where `idFuncionario`=?';
        $stmt=$conn->prepare($query);
        if($stmt === false){
            throw new \Exception("Falha ao preparar query.Erro:{$conn->error}");
        }
       if( $stmt->bind_param('i',$idFuncionario)=== false){
           throw new \Exception("Falha ao associar parametros.Erro:{$stmt->error}");
       }
        if($stmt->execute()=== false){
            throw new \Exception("Falha ao executar query.Erro:{$stmt->error}");
        }
        
       $result = $stmt->get_result();
        if($row =$result->fetch_assoc()){
            $funcionario=new Funcionario($row['idFuncionario'],$row['nome'],$row['usuario'],$row['senha'],$row['cargo']);
        }else{
            $funcionario=null;
        }
        
        $result->close();
       
        
        return $funcionario;
    }
     public static function getByLogin($login){
        $conn= DB::getConnection();        
         $query = 'select `idFuncionario`,`nome`,`usuario`,`senha`,cargo from funcionario where `usuario`=? ';
        $stmt=$conn->prepare($query);
        if($stmt === false){
            throw new \Exception("Falha ao preparar query.Erro:{$conn->error}");
        }
       if( $stmt->bind_param('s',$login)=== false){
           throw new \Exception("Falha ao associar parametros.Erro:{$stmt->error}");
       }
        if($stmt->execute()=== false){
            throw new \Exception("Falha ao executar query.Erro:{$stmt->error}");
        }
        
       $result = $stmt->get_result();
        if($row =$result->fetch_assoc()){
            $funcionario=new Funcionario($row['idFuncionario'],$row['nome'],$row['usuario'],$row['senha'],$row['cargo']);
        }else{
            $funcionario=null;
        }
        
        $result->close();
        $stmt->close();
       
        
        return $funcionario;
    }
    
    public static function atualizar($func){
        $conn= DB::getConnection();
        $query ='Update `funcionario` SET nome=?,usuario=?,senha=?,cargo=? WHERE idFuncionario=?';
        $stmt=$conn->prepare($query);
        if($stmt === false){
            throw new \Exception("Falha ao preparar query.Erro:{$conn->error}");
        }
        $idFuncionario=$func->getIdFuncionario();
        $nome=$func->getNome();
         $usuario=$func->getUsuario();
         $senha=$func->getSenha();
         $cargo=$func->getCargo();
        if( $stmt->bind_param('ssssi',$nome,$usuario,$senha,$cargo,$idFuncionario)=== false){
           throw new \Exception("Falha ao associar parametros.Erro:{$stmt->error}");
       }
        if($stmt->execute()=== false){
            throw new \Exception("Falha ao executar query.Erro:{$stmt->error}");
        }
        $stmt->close(); 
       
        
        
    }
    
     public static function excluir($idFuncionario){
        $conn= DB::getConnection();
        $query ='DELETE FROM  `funcionario` WHERE idFuncionario=?';
        $stmt=$conn->prepare($query);
        if($stmt === false){
            throw new \Exception("Falha ao preparar query.Erro:{$conn->error}");
        }
       
        
        if( $stmt->bind_param('i',$idFuncionario)=== false){
           throw new \Exception("Falha ao associar parametros.Erro:{$stmt->error}");
       }
        if($stmt->execute()=== false){
            throw new \Exception("Falha ao executar query.Erro:{$stmt->error}");
        }
       
        $stmt->close();  
        
        
    }
    
    
    function getIdFuncionario() {
        return $this->idFuncionario;
    }

    function getNome() {
        return $this->nome;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getSenha() {
        return $this->senha;
    }

    function getCargo() {
        return $this->cargo;
    }

    function setIdFuncionario($idFuncionario) {
        $this->idFuncionario = $idFuncionario;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    function __construct($idFuncionario, $nome, $usuario, $senha, $cargo) {
        $this->idFuncionario = $idFuncionario;
        $this->nome = $nome;
        $this->usuario = $usuario;
        $this->senha = $senha;
        $this->cargo = $cargo;
    }

}
