<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controllers;
use Models\Funcionario;
use Lib\Controller;
use Lib\Session;
use Lib\App;




use Lib\Router;


/**
 * Description of contatocontroller
 *
 * @author Ga_Ca
 */
class FuncionarioController extends Controller{
    
    public static function index(){
        if(filter_input(INPUT_SERVER, 'REQUEST_METHOD')=='POST'){
            
            $nome= filter_input(INPUT_POST, 'nome',FILTER_SANITIZE_STRING);
            $usuario= filter_input(INPUT_POST, 'usuario',FILTER_SANITIZE_STRING);
            $senha= \password_hash(filter_input(INPUT_POST, 'senha',FILTER_SANITIZE_STRING),PASSWORD_DEFAULT);
            $cargo= filter_input(INPUT_POST, 'cargo',FILTER_SANITIZE_STRING);
            
            if($nome==false||$usuario==false||$senha==false||$cargo==false){
                Session::setFlash("Todos os Campos são obrigatórios");
            }
            else{
            $func = new Funcionario(0,$nome,$usuario,$senha,$cargo);
            Funcionario::insere($func);
            Session::setFlash('Funcionário cadastrado com sucesso');


            }
        }
    }
    
    public function admin_nova(){
         if(filter_input(INPUT_SERVER, 'REQUEST_METHOD')=='POST'){
            
            $nome= filter_input(INPUT_POST, 'nome',FILTER_SANITIZE_STRING);
            $usuario= filter_input(INPUT_POST, 'usuario',FILTER_SANITIZE_STRING);
            $senha= \password_hash(filter_input(INPUT_POST, 'senha',FILTER_SANITIZE_STRING),PASSWORD_DEFAULT);
            $cargo= filter_input(INPUT_POST, 'cargo',FILTER_SANITIZE_STRING);
            
            if($nome==false||$usuario==false||$senha==false||$cargo==false){
                Session::setFlash("Todos os Campos são obrigatórios");
            }
            else{
            $func = new Funcionario(0,$nome,$usuario,$senha,$cargo);
            Funcionario::insere($func);
            Session::setFlash('Funcionário cadastrado com sucesso');


            }
        }
          
      }
        
        public  function admin_index(){
            $this->data['funcionarios'] = Funcionario::getFuncionarios();

          
      }
      public function admin_login() {
          if(filter_input(INPUT_SERVER, 'REQUEST_METHOD')=="POST"){
              $login = filter_input(INPUT_POST, 'login',FILTER_SANITIZE_STRING);
              $senha = filter_input(INPUT_POST, 'senha',FILTER_SANITIZE_STRING);
             
              if($login==false||$senha==false){
                  Session::setFlash('Todos os campos são obrigatórios');
                  Router::redirect(App::getRouter()->getUrl('funcionario','login',[],'admin'));
                 
              }
              
              $usuario= Funcionario::getByLogin($login);
              if($usuario == null|| password_verify($senha, $usuario->getSenha()) == false){
                  Session::setFlash('Não foi possivel achar funcionário com esses dados');
               
                  
              } else {
                  Session::set('usuario',$usuario);
                  
                  
              }
             Router::redirect(App::getRouter()->getUrl('','',[],'admin'));         
          }
          
      }
      
      public function admin_editar($id){
          $request =filter_input(INPUT_SERVER,'REQUEST_METHOD');
          if($request=="POST"){
              $idFuncionario= filter_input(INPUT_POST, 'idFuncionario',FILTER_SANITIZE_NUMBER_INT);
              $nome= filter_input(INPUT_POST, 'nome',FILTER_SANITIZE_STRING);
              $usuario= filter_input(INPUT_POST, 'usuario',FILTER_SANITIZE_STRING);
              $senha= \password_hash(filter_input(INPUT_POST, 'senha',FILTER_SANITIZE_STRING),PASSWORD_DEFAULT);
              $cargo= filter_input(INPUT_POST, 'cargo',FILTER_SANITIZE_STRING);

              
              if($idFuncionario==False||$idFuncionario<=0){
                  Session::setFlash("Funcionario não encontrado");
                  Router::redirect(App::getRouter()->getUrl('funcionario'));
              }
              else if($nome==false||$usuario==false||$senha==false||$cargo==false){
                  Session::setFlash("Todos os campos são obrigatórios");
                  Router::redirect(App::getRouter()->getUrl('funcionario','editar',[$idFuncionario]));                 
              }
              $func = new Funcionario($idFuncionario,$nome,$usuario,$senha,$cargo);
              Funcionario::atualizar($func);
              Session::setFlash("Funcionario atualizado com sucesso");
              Router::redirect(App::getRouter()->getUrl('funcionario'));
              
          }else if($request=="GET"){
              $idFuncionario= filter_var($id,FILTER_SANITIZE_NUMBER_INT);
              if($idFuncionario==False||$idFuncionario<0){
                  Session::setFlash("Funcionário não encontrado");
                  Router::redirect(App::getRouter()->getUrl('funcionario'));
              }
              $this->data['funcionario']= Funcionario::getFuncionariosPorId($idFuncionario);
              
              
          }
          
      }
      
       public function admin_excluir($id){
           $idFuncionario= filter_var($id,FILTER_SANITIZE_NUMBER_INT);
              if($idFuncionario==False||$idFuncionario<0){
                  Session::setFlash("Funcionario não encontrado");
                  Router::redirect(App::getRouter()->getUrl('funcionario'));
                 
              }
              Funcionario::excluir($idFuncionario);
              Session::setFlash("funcionario Excluido com sucesso");
              Router::redirect(App::getRouter()->getUrl('funcionario'));
          
      }
      public function admin_logout(){
          Session::destroy();
          Router::redirect('?route=admin');
          
      }

          
      
        
        
      
  }

