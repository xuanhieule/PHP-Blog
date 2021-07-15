<?php
require_once("connection.php");
$sql = "SELECT * FROM post where status=1";
$result = mysqli_query($connection, $sql);
?>
 <?php
	require("header.php");
 ?>
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

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <?php
        if (mysqli_num_rows($result) > 0 ){
          while ($row = mysqli_fetch_assoc($result)){
            ?>
            <div class="post-preview">
            <a href="post.html">
              <div class="row">
                <div class="col-md-4 mt-2">
                  <!-- <img src="img/post-bg.jpg" class="img-fluid" alt=""> -->
                  <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" class="img-fluid" alt="Image"/>'; ?>
                </div>
                <div class="col-md-8">
                  <h2 class="post-title">
                    <?php echo $row['title']; ?>
                  </h2>
                  <h3 class="post-subtitle">
                  <?php echo $row['subtitle']; ?>
                  </h3>
                </div>
              </div>
            </a>
		

		
            <p class="post-meta">Posted by:
              <a href="#"><?php echo $row['author_id']; ?></a> Time: <?php echo $row['created_at']; ?></p>
          </div>        
          <hr>
          <?php
          }
      } 
        ?>

  
      </div>
    </div>
  </div>

  <hr>

  <!-- Footer -->
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
              <a href="https://facebook.com/xuanhieu.le.775" target="_blank">
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
