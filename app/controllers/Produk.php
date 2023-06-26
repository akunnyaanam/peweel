<?php

class Produk extends Controller {
  
	public function index(){
		session_start();
		if (empty($_SESSION['cart']["arrCart"]))
			$_SESSION['cart']["arrCart"]=array(); 					
		
		$data['title'] = 'Data Produk';
		$data['produk'] = $this->model('Produk_model')->getAllProduk();
		$this->view('templates/header', $data);
		$this->view('produk/index', $data);
		$this->view('templates/footer');
	}

	public function addCart(){	      
		$url=$this->parseURL($_GET['url']);
		$id=$url[2];
		$this->model('Produk_model')->addCart($id);	   
		$this->view('templates/header2');
		$this->view('produk/listCart');
		$this->view('templates/footer');
	}
	public function viewCart(){	  
		session_start();   
		$this->view('templates/header2');
		$this->view('produk/listCart');
		$this->view('templates/footer');
	}

	public function removeCart(){	      
		session_start();
		unset($_SESSION['cart']);      
		$this->view('templates/header');
		$this->view('produk/listCart');
		$this->view('templates/footer');
	}

	 public function parseURL(){
		if( isset($_GET['url'])){
			$url = rtrim($_GET['url'], '/');   //hilangkan '/'
			$url = filter_var($url, FILTER_SANITIZE_URL);  //hilangkan karakter ilegal
			$url = explode('/',$url); //merubah string ke array dg pemisah /
			return $url;
		}
	}

	public function checkOut(){	      
		session_start();
		if (isset($_SESSION['cart'])){
		  if (!empty($_SESSION['cart']["arrCart"]))   		  
			$this->view('templates/header');
			$this->view('produk/checkOut');
			$this->view('templates/footer');		 
		  }
	}
	public function prosesCheckOut(){	      
		$this->model('Order_model')->addOrder($_POST);	
		$this->index();
	}
          
}

