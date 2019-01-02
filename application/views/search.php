<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Project</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/bootstrap.min.css">	
	<style>
		.popup{
    margin: auto;
    text-align: center
}
.popup img{
    width: 200px;
    height: 200px;
    cursor: pointer
}
.show{
    z-index: 999;
    display: none;
}
.show .overlay{
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,.66);
    position: absolute;
    top: 0;
    left: 0;
}
.show .img-show{
    width: 600px;
    height: 400px;
    background: #FFF;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    overflow: hidden
}
.img-show span{
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 99;
    cursor: pointer;
}
.img-show img{
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
}
.news-item { display:inline-block; vertical-align:top; width:300px;} 
/*End style*/
	</style>
	
</head>
<body>

	<div class="container">
		<h2><a class="btn btn-primary" href="<?php echo base_url(); ?>" role="button"><--Back</a> Employe List</h2>
		<hr>
		<?php echo form_open_multipart('employe/searchEmploye');?>
			<div class="row">
			<div class="col">
				<div class='form-group'>
					<input type="text" name="search" class="form-control" placeholder="Search by.....">
				</div>
			</div>
				<div class="col">
					<div class='form-group'>
						<input type="submit" class="btn btn-primary" value="Filter">
					</div>
				</div>
			</div>
		</form>
		<div class="row">
      <table class="table table-bordered table-striped">
        <thead>
        	<tr>
        		<th colspan="8">
        			Employe
        			<a class="btn btn-primary" href="<?php echo base_url(); ?>employe/add_employe" role="button" style="float: right;"><b>+</b> Add Employe</a>
        		</th>
        	</tr>
          <tr>
          	<th>Name</th>
          	<th>Phone</th>
          	<th>Address</th>
          	<th>Position</th>
          	<th>Date</th>
          	<th>KTP File</th>
          	<th> </th>
          </tr>
        </thead>
        <tbody>
        	<?php 
        		foreach ($search as $value) {
        	?>
          <tr style="font-size:14px;">
          	<th><a href="<?php echo base_url().'employe/detailEmploye/'.$value->id;?>"><?php echo $value->first.' '.$value->last; ?></a></th>
          	<th><?php echo $value->phone; ?>e</th>
          	<th><?php echo $value->address; ?></th>
          	<th><?php echo $value->position; ?></th>
          	<th><?php echo $value->date; ?></th>
          	<th>
          		<div class="popup">
  							<img src="<?php echo base_url().'ktp/'.$value->ktpfname; ?>" style="width:100px; height:50px;">
  						</div>
  					</th>
            <td>
            	<a class="btn btn-primary" href="<?php echo base_url().'employe/updateEmploye/'.$value->id; ?>" role="button">Update</a>
            	<a class="btn btn-danger" href="<?php echo base_url().'employe/deleteEmploye/'.$value->id; ?>" role="button">Delete</a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
		</div>
		
		<div class="show">
		  <div class="overlay"></div>
		  <div class="img-show">
		    <span>X</span>
		    <img src="">
		  </div>
		</div>
	</div>
<script type="text/javascript" src="<?php echo base_url(); ?>style/js/jquery-3.3.1.min.js"></script>
<script>
	$(function () {
    "use strict";
    
    $(".popup img").click(function () {
        var $src = $(this).attr("src");
        $(".show").fadeIn();
        $(".img-show img").attr("src", $src);
    });
    
    $("span, .overlay").click(function () {
        $(".show").fadeOut();
    });
    
});
</script>
</body>
</html>