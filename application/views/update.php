<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Project</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/datepicker.css">
	
</head>
<body>
<div class="container">
	<h2><a class="btn btn-primary" href="<?php echo base_url(); ?>" role="button"><--Back</a> Update Employe</h2>
	<hr>
	<?php
		foreach ($update->result() as $value) { 
			echo form_open_multipart('employe/postUpdateEmploye/'.$value->id);
	?>
	<div class="row">
		<div class="col">
			<div class='form-group'>
				<label>First Name</label>
				<input type="text" name="first" class="form-control" value="<?php echo $value->first; ?>">
			</div>
		</div>
		<div class="col">
			<div class='form-group'>
				<label>Last Name</label>
				<input type="text" name="last" class="form-control" value="<?php echo $value->last; ?>">
			</div>
		</div>
		<div class="col">
			<div class='form-group'>
				<label>Date of Birth</label> <!-- HARUS MENGGUNAKAN DATEPICKER-->
				<input class="date-picker form-control" name="birth" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" value="<?php echo $value->birth; ?>" />
			</div>
		</div>
	</div>
	
	
		<div class='form-group'>
			<label>Phone</label> <!-- TIDAK BOLEH ADA HURUF-->
			<input type="text" name="phone" class="form-control" value="<?php echo $value->phone; ?>">
			<span style="color: red;"><?php echo form_error('phone'); ?></span>
		</div>
		<div class='form-group'>
			<label>E-Mail</label> <!-- HARUS ADA @ NYA-->
			<input type="text" name="email" class="form-control" value="<?php echo $value->email; ?>">
			<span style="color: red;"><?php echo form_error('email'); ?></span>
		</div>
		<div class="row">
			<div class="col">
				<div class='form-group'>
					<label>Province</label>
					<select class='form-control' name="provinsi" id="provinsi">
						<option  value="<?php echo $value->id_prov; ?>"><?php echo $value->provinsi; ?></option>
						<?php 
							foreach ($provinsi->result_array() as $prov) {
								echo "<option value='$prov[id_prov]'>$prov[provinsi]</option>";
							}
						?>
					</select>
				</div>
			</div>
			<div class="col">
				<div class='form-group'>
					<label>City</label>
					<select class='form-control' name="kota" id="kota">
						<option  value="<?php echo $value->id_kota_kab; ?>"><?php echo $value->kota_kab; ?></option>
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class='form-group'>
					<label>Address</label><br></ber>
					<textarea class='form-group col-12' name="address"><?php echo $value->address; ?></textarea>
				</div>
			</div>
			<div class="col">
				<div class='form-group'>
					<label>Zip Code</label>
					<input type="text" name="zip" class="form-control" value="<?php echo $value->zip; ?>">
					<span style="color: red;"><?php echo form_error('zip'); ?></span>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col">
				<div class='form-group'>
					<label>KTP Number</label>
					<input type="text" name="ktp" class="form-control" value="<?php echo $value->ktp; ?>">
					<span style="color: red;"><?php echo form_error('ktp'); ?></span>
				</div>
			</div>
			<div class="col">
				<div class='form-group'>
					<label>Attach KTP</label>
					<input type="file" class="form-control" name="userfile">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class='form-group'>
					<label>Current Position</label>
					<select class='form-control' name='position'>
						<option value="<?php echo $value->position; ?>"><?php echo $value->position; ?></option>
						<option disabled>---------</option>
						<option value='Manager'>Manager</option>
						<option value='Supervisor'>Supervisor</option>
						<option value='Staff Software Development'>Staff Software Development</option>
						<option value='Staff SOC'>Staff SOC</option>
					</select>
				</div>
			</div>
			<div class="col">
				<div class='form-group'>
					<label>Bank Account</label>
					<select class='form-control' name='bank'>
						<option value="<?php echo $value->bank; ?>"><?php echo $value->bank; ?></option>
						<option disabled>---------</option>
						<option value="Mandiri">Mandiri</option>
						<option value="BNI">BNI</option>
						<option value="BRI">BRI</option>
						<option value="BTN">BTN</option>
						<option value="BCA">BCA</option>
						<option value="Bukopin">Bukopin</option>
						<option value="Danamon">Danamon</option>
					</select>
				</div>
			</div>
			<div class="col">
				<div class='form-group'>
					<label>Bank Account Number</label>
					<input type="text" name="n_bank" class="form-control" value="<?php echo $value->n_bank; ?>">
				</div>
			</div>
		</div>
		<center><input type="submit" class="btn btn-danger"></center>
	</form>	
	
	<?php } ?>
</div>


<script type="text/javascript" src="<?php echo base_url(); ?>style/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url(); ?>style/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>style/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>style/js/app.js"></script>
<script src="<?php echo base_url(); ?>style/js/form-components.js"></script>

<script>
	jQuery(document).ready(function() {
	   FormComponents.init();
	});
</script>
<script>
  $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    // Kita sembunyikan dulu untuk loadingnya
    $("#loading").hide();
    $("#provinsi").change(function(){ // Ketika user mengganti atau memilih data provinsi
      $("#kota").hide(); // Sembunyikan dulu combobox kota nya
      $("#loading").show(); // Tampilkan loadingnya
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url(); ?>employe/get_kota_kab", // Isi dengan url/path file php yang dituju
        data: {id_provinsi : $("#provinsi").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil
          $("#loading").hide(); // Sembunyikan loadingnya
          // set isi dari combobox kota
          // lalu munculkan kembali combobox kotanya
          $("#kota").html(response.list_kota).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    });
  });
  </script>
<script type="text/javascript">
	$(function() {
		$('.date-picker').datepicker().next().on(ace.click_event, function(){
			$(this).prev().focus();
		});
	});
</script>
</body>
</html>