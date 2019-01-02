<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Project</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/bootstrap.min.css">	
</head>
<body>

<div class="container">
		<h2>Employe List</h2>
		<hr>
		<div>
      <table class="table table-bordered table-striped">
        <thead>
        	<tr>
        		<th colspan="7">
        			Employe List
        			<a class="btn btn-primary" href="#" role="button" style="float: right;"><b>+</b> Add Employe</a>
        		</th>
        	</tr>
          <tr>
          	<th>Name</th>
          	<th>Phone</th>
          	<th>Date</th>
          	<th>Address</th>
          	<th>Position</th>
          	<th>KTP File</th>
          	<th> </th>
          </tr>
        </thead>
        <tbody>
          <tr>
          	<th>Name</th>
          	<th>Phone</th>
          	<th>Date</th>
          	<th>Address</th>
          	<th>Position</th>
          	<th>KTP File</th>
            <td>
            	<a class="btn btn-primary" href="#" role="button">Update</a>
            	<button type="submit" class="btn btn-danger">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
		</div>
		
			<div class='form-group'>
			<label>Provinsi</label>
			<select class='form-control' id='provinsi'>
			<option value='0'>--pilih--</option>
			<?php 
			foreach ($provinsi->result_array() as $prov) {
			echo "<option value='$prov[id_prov]'>$prov[provinsi]</option>";
			}
			?>
			</select>
			</div>

			<div class='form-group'>
			<label>Kabupaten/kota</label>
			<select class='form-control' id='kabupaten-kota'>
			<option value='0'>--pilih--</option>
			</select>
			</div>

	</div>

<script type="text/javascript">
$(function(){
	$.ajaxSetup({
		type:"POST",
		url: "<?php echo base_url('project/ambil_kota_kab') ?>",
		cache: false,
	});

	$("#provinsi").change(function(){
		var value=$(this).val();
		if(value>0){
			$.ajax({
				data:{modul:'kota_kab',id:value},
				success: function(respond){
					$("#kabupaten-kota").html(respond);
				}
			})
		}

	});
})

</script>

</body>
</html>