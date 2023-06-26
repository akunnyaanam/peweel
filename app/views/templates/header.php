<?php
 $str="
 <!DOCTPE html>
 <html lang='en'>
  <head>
    <!-- Required meta tags -->
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <!-- Bootstrap CSS -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We' crossorigin='anonymous'>

    <title>Toko Tanaman Hias</title>
	<style>
	.jumbotron {
		position: relative;
		background: #000 url('img/tmn3.jpg') center center;
		width: 90%;
		height: 70%;
		background-size: cover;
		overflow: hidden;
	}	
	</style>
  </head>
  <body> 
	<nav class='navbar navbar-expand-lg navbar-light bg-light'>
	  <div class='container-fluid'>
		<div class='collapse navbar-collapse' id='navbarNav'>
		  <ul class='navbar-nav'>
			<li class='nav-item'>
			  <a class='nav-link active' aria-current='page' href='".BASEURL."/home'>Home</a>
			</li>
			<li class='nav-item'>
			  <a class='nav-link' href='".BASEURL."/produk'>Produk</a>
			</li>
			<li class='nav-item'>
			  <a class='nav-link' href='".BASEURL."/produk/viewCart'>Cart</a>
			</li>			
			<li class='nav-item'>
			  <a class='nav-link' href='".BASEURL."/member'>Member</a>
			</li>
			<li class='nav-item'>
			  <a class='nav-link' href='about'>About</a>
			</li>

		  </ul>
		</div>
	  </div>
	</nav> ";
echo $str;
?>