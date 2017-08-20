<?php
namespace Controllers;
use Lib\Controller;
use Models\Produto;
use Lib\Session;
use Lib\App;
use Lib\Router;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProdutoController
 *
 * @author Ga_Ca
 */
class ProdutoController extends Controller {
      public function index(){
          $this->data['produtos']= Produto::getProdutos(false);
          
      }
      public function ver($idProduto){
          $idProduto= filter_var($idProduto,FILTER_SANITIZE_NUMBER_INT);
          if($idProduto!=FALSE){
              $this->data['produto']= Produto::getProdutosPorId($idProduto);
          }
      }
      
      public function admin_index(){
        $this->data['produtos']= Produto::getProdutos();

          
      }
      public function admin_nova(){
          if(filter_input(INPUT_SERVER,'REQUEST_METHOD')=="POST"){
              $nome= filter_input(INPUT_POST, 'nome',FILTER_SANITIZE_STRING);
              $valor= filter_input(INPUT_POST, 'valor',FILTER_SANITIZE_NUMBER_FLOAT);
              $descricao= filter_input(INPUT_POST, 'descricao',FILTER_SANITIZE_STRING);
              $disponivel = filter_input(INPUT_POST, 'disponivel')? 1: 0;
              
              if($nome==false||$valor==false||$descricao==false){
                  Session::setFlash("Todos os campos são obrigatórios");
                  Router::redirect(App::getRouter()->getUrl('produto','nova'));
                  
              }
              $produto = new Produto(0,$nome,$valor,$descricao,$disponivel);
              Produto::insere($produto);
              Session::setFlash("produto adicionado com sucesso");
              Router::redirect(App::getRouter()->getUrl('produto'));
              
          }
          
      }
      public function admin_editar($id){
          $request =filter_input(INPUT_SERVER,'REQUEST_METHOD');
          if($request=="POST"){
              $idProduto= filter_input(INPUT_POST, 'idProduto',FILTER_SANITIZE_NUMBER_INT);
              $nome= filter_input(INPUT_POST, 'nome',FILTER_SANITIZE_STRING);
              $valor= filter_input(INPUT_POST, 'valor',FILTER_SANITIZE_NUMBER_FLOAT);
              $descricao= filter_input(INPUT_POST, 'descricao',FILTER_SANITIZE_STRING);
              $disponivel = filter_input(INPUT_POST, 'disponivel')? 1: 0;
              if($idProduto==False||$idProduto<=0){
                  Session::setFlash("Produto não encontrado");
                  Router::redirect(App::getRouter()->getUrl('produto'));
              }
              else if($nome==false||$valor==false||$descricao==false){
                  Session::setFlash("Todos os campos são obrigatórios");
                  Router::redirect(App::getRouter()->getUrl('produto','editar',[$idProduto]));
                  
              }
              $produto = new Produto($idProduto,$nome,$valor,$descricao,$disponivel);
              Produto::atualizar($produto);
              Session::setFlash("produto atualizado com sucesso");
              Router::redirect(App::getRouter()->getUrl('produto'));
              
          }else if($request=="GET"){
              $idProduto= filter_var($id,FILTER_SANITIZE_NUMBER_INT);
              if($idProduto==False||$idProduto<0){
                  Session::setFlash("Produto não encontrada");
                  Router::redirect(App::getRouter()->getUrl('produto'));
              }
              $this->data['produto']= Produto::getProdutosPorId($idProduto);
              
              
          }
          
      }
      public function admin_excluir($id){
           $idProduto= filter_var($id,FILTER_SANITIZE_NUMBER_INT);
              if($idProduto==False||$idProduto<0){
                  Session::setFlash("Produto não encontrado");
                  Router::redirect("?route=admin&module=produto");
              }
              Produto::excluir($idProduto);
              Session::setFlash("Produto Excluido com sucesso");
               Router::redirect("?route=admin&module=produto");
          
      }
}
