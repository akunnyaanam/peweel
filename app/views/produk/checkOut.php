<div class="container">
  <div class="row">
    <div class="col-6">
	<?php
		if (!empty($_SESSION['cart'])){
			$hrg=$byr=$jml=0;$nama="";			
			echo "<p class='bg-info text-white'>Jml data :".sizeof($_SESSION['cart']['arrCart'])."</p>";			
			$max=sizeof($_SESSION['cart']['arrCart']);
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
    <div class="col-6">
    	<form action="<?= BASEURL; ?>/produk/prosesCheckOut" method="post" name="fOrder"> 
		<div class="mb-3">
		  <label for="lNama" class="form-label">Nama/IDMember</label>
		  <input type="text" class="form-control" id="nama" name="nama"  required>
		  <input type="text" class="form-control" name="idMember" required>
		</div>	
		<div class="mb-3">
		  <label for="lAlmt" class="form-label">Alamat/telp</label>
		  <input type="text" class="form-control" id="almt" name="almt">
		  <input type="text" class="form-control" id="telp" name="telp">
		</div>	
		Jenis Pembayaran:
		<select class="form-select" aria-label="Default select example" name="cbJnsByr">		  
		  <option value="tf">TransferBank</option>
		  <option value="kk">Kartu Credit</option>
		  <option value="vaMandiri">VirtualAccount Mandiri</option>
		  <option value="ovo">OVO</option>
		  <option value="linkAja">LinkAja</option>
		</select>
		<div class="mb-3">
		  <label for="lnoByr" class="form-label">Bank/Norek :</label>
		  <input type="text" class="form-control" id="bank" name="bank"  required> 
		  <input type="text" class="form-control" id="norek" name="norek"  required> 
		</div>		
		<div class="mb-3">
		  <label for="lKirim" class="form-label">Pengiriman/Biaya Kirim:</label>
			<select class="form-select" aria-label="Default select example" name="cbKirim">
			  <option value="cod" selected>JNE</option>
			  <option value="tf">Tiki</option>
			  <option value="kk">Ninja Express</option>
			  <option value="vaMandiri">J&TExpress </option>
			  <option value="ovo">OVO</option>
			  <option value="linkAja">Sicepat Express</option>
			</select>
		  
		  <input type="text" class="form-control" id="biayaKirim" name="biayaKirim"  required> 
		</div>		
		
	    <div class="mb-3">
		   <button class="btn btn-primary" type="submit">CheckOut</button>
	    </div>		
	</form>	
	</div>
  </div>
</div>	

	
	
	