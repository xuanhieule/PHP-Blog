<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>H3NM Blog</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/styles.css" rel="stylesheet">

</head>


<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.html">H3NM</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="manage.php">Manage</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="createPost.php">Create Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="editProfile.php">Edit Profile</a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>
 


  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>H3MN Blog</h1>
            <span class="subheading">An amazing IT blog.</span>
          </div>
        </div>
      </div>
    </div>
  </header>
<?php
require('connection.php');
require('function.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($connection,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($connection,$_GET['operation']);
		$id=get_safe_value($connection,$_GET['p_id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update post set status='$status' where p_id='$id'";
		mysqli_query($connection,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($connection,$_GET['p_id']);
		$delete_sql="delete from post where p_id='$id'";
		mysqli_query($connection,$delete_sql);
	}
}

$sql="select * from post order by title asc";
$res=mysqli_query($connection,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Blog</h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
                            <th style="text-align: center">ID</th>
                            <th style="text-align: center">Title</th>
                            <th style="text-align: center">SubTitle</th>
                            <th style="text-align: center">Content</th>
                            <th style="text-align: center">Time</th>
                            <th style="text-align: center">ID_Author</th>
                            <th style="text-align: center"> ID_Category</th>
                            <th style="text-align: center">Status</th>
                            <th style="text-align: center" > Action</th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							    
                                <td style="text-align: center"><?php echo $row['p_id']?></td>
                                <td style="text-align: center"><?php echo $row['title']?></td>
                                <td style="text-align: center"><?php echo $row['subtitle']?></td>
                                <td style="text-align: center"><?php echo $row['content']?></td>
                                <td style="text-align: center"><?php echo $row['time']?></td>
                                <td style="text-align: center"><?php echo $row['author_id']?></td>
                                <td style="text-align: center"><?php echo $row['category_id']?></td>
                                <td style="text-align: center"><?php echo $row['status']?></td>
							   <td style="text-align: center; display: flex">
								<?php
								if($row['status']==1){
									echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&p_id=".$row['p_id']."' class='btn btn-success'>Active</a></span>&nbsp;";
								}else{
									echo "<span class='badge badge-pending'><a href='?type=status&operation=active&p_id=".$row['p_id']."' class='btn btn-warning'>Deactive</a></span>&nbsp;";
								}
					
								
								echo "<span class='badge badge-delete'><a href='?type=delete&p_id=".$row['p_id']."'class='btn btn-danger'>Ban</a></span>";
								
								?>
							   </td>
							</tr>
							<?php }
							
							 ?>
						 </tbody>
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<!--==========================================--!>
<?php


if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($connection,$_GET['type']);
	if($type=='role'){
		$operation=get_safe_value($connection,$_GET['operation']);
		$id=get_safe_value($connection,$_GET['u_id']);
		if($operation=='active'){
			$role='1';
		}else{
			$role='0';
		}
		$update_roles_sql="update users set role='$role' where u_id='$id'";
		mysqli_query($connection,$update_roles_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($connection,$_GET['u_id']);
		$delete_sql="delete from users where u_id='$id'";
		mysqli_query($connection,$delete_sql);
	}
}

$sql="select * from users order by u_id asc";
$res=mysqli_query($connection,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">User</h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
                            		    <th class="serial" style="text-align: center">#</th>
                                            <th style="text-align: center">Username</th>
                                           
                                            <th style="text-align: center">Full_name</th>
                                            <th style="text-align: center">Role</th>
                                            <th style="text-align: center"> Action</th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							    
                                <td style="text-align: center"><?php echo $row['u_id']?></td>
                                          <td style="text-align: center"><?php echo $row['username']?></td>
                                          <td style="text-align: center"><?php echo $row['fullname']?></td>
                                          <td style="text-align: center"><?php echo $row['role']?></td>
                                          <td style="text-align: center">
                                            <?php    
						if($row['role']==1){
									echo "<span class='badge badge-complete'><a href='?type=role&operation=deactive&u_id=".$row['u_id']."' class='btn btn-primary'>Admin</a></span>&nbsp;";
								}else{
									echo "<span class='badge badge-pending'><a href='?type=role&operation=active&u_id=".$row['u_id']."' class='btn btn-primary'>Writer</a></span>&nbsp;";
								}
						echo "<span class='badge badge-delete'><a href='?type=delete&u_id=".$row['u_id']."' class='btn btn-danger'>Blocks</a></span>";
						?>
                                            </td>
							</tr>
							<?php }
							
							 ?>
						 </tbody>
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="mailto:xuanhieu.le.1999@gmail.com" target="_blank">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-google fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="https://github.com/xuanhieule" target="_blank">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="https://facebook.com/xuanhieu.le.1999" target="_blank">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/main.js"></script>
</body>
</html>



