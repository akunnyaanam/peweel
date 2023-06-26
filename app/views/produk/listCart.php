	<div class="container">
	<a href="<?= BASEURL; ?>/produk" class='btn btn-primary text-white'>List Produk</a>
	<?php
		if (!empty($_SESSION['cart'])){
			$hrg=$byr=$jml=0;$nama="";						
			echo  "<a href='".BASEURL."/produk/removeCart' class='btn btn-success text-white'>Kosongkan Cart</a>";
			echo "<p class='bg-info text-white'>Jml data :".sizeof($_SESSION['cart']['arrCart'])."</p>";			
			$max=sizeof($_SESSION['cart']['arrCart']);
			if ($max>0){
				echo  "<a href='".BASEURL."/produk/checkOut' class='btn btn-primary text-white'>ChekOut</a>";
			}
			echo "<table class='table table-striped'>
		          <thead>
					<tr>					
					<th scope='col'>ID</th>
					<th scope='col'>Nama</th>
					<th scope='col'>Jml</th>
					<th scope='col'>Harga</th>
					<th scope='col'>Byr</th>
					</tr>
				</thead>
				<tbody>";
			$totbyr=0;	
			for ($i=0;$i<$max;$i++){
				echo "<tr>";
				foreach($_SESSION['cart']['arrCart'][$i] as $key => $val){
				   if ($key=='hrg'){
					  $hrg=$val;   					  
					  echo "<td>".number_format($hrg)."</td>";
				   } else{ 
					   echo "<td>$val</td>";
				   }					   										
				   if ($key=='jml')
					$jml=$val;									   					   									   
				}
				$byr=$jml*$hrg;
				$totbyr+=$byr;	
				echo "<td style='text-align:right;'>".number_format($byr)."</td>"; 
				echo "</tr>";	
			}	
			echo "<tr><td colspan='5' style='text-align:right;'>Total Bayar :&nbsp&nbsp&nbsp".number_format($totbyr)." <td></tr>";
			echo "</tbody>
				  </table>";
		}else
			echo "<p class='bg-info text-white'>cart kosong</p>";

	?>	
	</div>	