<?php
namespace Controllers;
use Lib\Controller;
use Models\Produto;
use Models\Pedido;
use Lib\Session;
use Lib\Router;
use Lib\App;


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PedidoController
 *
 * @author Ga_Ca
 */
class PedidoController extends Controller {
       public function index(){
          $this->data['pedidos']= Pedido::getPedidos(true);
          
      }
      public function ver($idPedido){
          $idPedido= filter_var($idPedido,FILTER_SANITIZE_NUMBER_INT);
          if($idPedido!=FALSE){
              $this->data['pedido']= Pedido::getPedidosPorId($idPedido);
          }
      }
      public function admin_ver($idPedido){
          $idPedido= filter_var($idPedido,FILTER_SANITIZE_NUMBER_INT);
          if($idPedido!=FALSE){
              $this->data['pedido']= Pedido::getPedidosPorId($idPedido);
          }
      }
      
      public function admin_index(){
        $this->data['pedidos']= Pedido::getPedidos();

          
      }
      public function admin_nova(){
          if(filter_input(INPUT_SERVER,'REQUEST_METHOD')=="POST"){
              $nome= filter_input(INPUT_POST, 'nome',FILTER_SANITIZE_STRING);
              $endereco= filter_input(INPUT_POST, 'endereco',FILTER_SANITIZE_STRING);
              $quantidade= filter_input(INPUT_POST, 'quantidade',FILTER_SANITIZE_NUMBER_INT);
              
              
              
              if($nome==false||$endereco==false||$quantidade==false||$produto==false){
                  Session::setFlash("Todos os campos são obrigatórios");
                  Router::redirect(App::getRouter()->getUrl('pedido','nova'));
                  
              }
              $produto = Produto::getProdutosPorId($produto);
                    if ($produto == NULL) {
                         Session::setFlash("Produto não existe");
                         Router::redirect(App::getRouter()->getUrl('pedido','nova'));
                    }
              $pedido = new Pedido(0,$nome,$endereco,$quantidade,$produto);
              Pedido::insere($pedido);
              Session::setFlash("pedido adicionado com sucesso");
              Router::redirect(App::getRouter()->getUrl('pedido'));
              
          }
          
      }
      
      public function nova(){
           if(filter_input(INPUT_SERVER,'REQUEST_METHOD')=="POST"){
              $nome= filter_input(INPUT_POST, 'nome',FILTER_SANITIZE_STRING);
              $endereco= filter_input(INPUT_POST, 'endereco',FILTER_SANITIZE_STRING);
              $quantidade= filter_input(INPUT_POST, 'quantidade',FILTER_SANITIZE_NUMBER_INT);
              $produto = filter_input(INPUT_POST,'prod',FILTER_SANITIZE_NUMBER_INT);
              
              
              if($nome==false||$endereco==false||$quantidade==false||$produto==false){
                  Session::setFlash("Todos os campos são obrigatórios");
                  Router::redirect(App::getRouter()->getUrl('pedido','nova'));
                  
              }
              $produto = Produto::getProdutosPorId($produto);
                    if ($produto == NULL) {
                         Session::setFlash("Produto não existe");
                         Router::redirect(App::getRouter()->getUrl('pedido','nova'));
                    }
              $pedido = new Pedido(0,$nome,$endereco,$quantidade,$produto);
              Pedido::insere($pedido);
              Session::setFlash("pedido adicionado com sucesso");
              Router::redirect(App::getRouter()->getUrl('pedido'));
              
          }
          
      }
      public function admin_editar($id){
          $request =filter_input(INPUT_SERVER,'REQUEST_METHOD');
          if($request=="POST"){
              $idPedido= filter_input(INPUT_POST, 'idProduto',FILTER_SANITIZE_NUMBER_INT);
              $nome= filter_input(INPUT_POST, 'nome',FILTER_SANITIZE_STRING);
              $endereco= filter_input(INPUT_POST, 'endereco',FILTER_SANITIZE_STRING);
              $quantidade= filter_input(INPUT_POST, 'quantidade',FILTER_SANITIZE_NUMBER_INT);
               $produto = filter_input(INPUT_POST,'prod',FILTER_SANITIZE_NUMBER_INT);

              if($idPedido==False||$idPedido<=0){
                  Session::setFlash("Pedido não encontrado");
                  Router::redirect(App::getRouter()->getUrl('pedido'));
              }
              else if($nome==false||$endereco==false||$quantidade==false||$produto==false){
                  Session::setFlash("Todos os campos são obrigatórios");
                  Router::redirect(App::getRouter()->getUrl('pedido','editar',[$idPedido]));                 
              }
              
              $produto = Produto::getProdutosPorId($produto);
                    if ($produto == NULL) {
                         Session::setFlash("Produto não existe");
                         Router::redirect(App::getRouter()->getUrl('pedido','nova'));
                    }
                    
              $pedido = new Pedido($idPedido,$nome,$endereco,$quantidade,$produto);
              Pedido::atualizar($pedido);
              Session::setFlash("pedido atualizado com sucesso");
              Router::redirect(App::getRouter()->getUrl('pedido'));
              
          }else if($request=="GET"){
              $idPedido= filter_var($id,FILTER_SANITIZE_NUMBER_INT);
              if($idPedido==False||$idPedido<0){
                  Session::setFlash("Pedido não encontrado");
                  Router::redirect(App::getRouter()->getUrl('pedido'));
              }
              $this->data['pedido']= Pedido::getPedidosPorId($idPedido);
              
              
          }
          
      }
      public function admin_excluir($id){
           $idPedido= filter_var($id,FILTER_SANITIZE_NUMBER_INT);
              if($idPedido==False||$idPedido<0){
                  Session::setFlash("Pedido não encontrado");
                  Router::redirect(App::getRouter()->getUrl('pedido'));
                 
              }
              Pedido::excluir($idPedido);
              Session::setFlash("Pedido Excluido com sucesso");
              Router::redirect(App::getRouter()->getUrl('pedido'));
          
      }
}
