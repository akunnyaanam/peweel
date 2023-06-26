<?php
class App {
 protected $controller = 'Home';
 protected $method = 'index';
 protected $params = [];

 public function __construct(){   
  
  $url=$this->parseURL();
  if (is_null($url)){
	  $url=array("Home");
  }
  if(file_exists('../app/controllers/' . $url[0] . '.php')){
   $this->controller = $url[0];
   unset($url[0]);
  }

  require_once '../app/controllers/' . $this->controller . '.php';
  $this->controller = new $this->controller;

  if(isset($url[1])){
   if(method_exists($this->controller, $url[1])){
    $this->method = $url[1];
    unset($url[1]);
   }
  }

  if(!empty($url)){
   $this->params = array_values($url); //Mengembalikan array yang isinya semua nilai array
  }

  //jalankan controller
  call_user_func_array([$this->controller, $this->method], $this->params) ;// mengisikan controler,method dg array params
 }
 public function parseURL(){
  if( isset($_GET['url'])){
   $url = rtrim($_GET['url'], '/');   //hilangkan '/'
   $url = filter_var($url, FILTER_SANITIZE_URL);  //hilangkan karakter ilegal
   $url = explode('/',$url); //merubah string ke array dg pemisah /
   return $url;
  }
 }
 
}
?>
