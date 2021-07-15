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

    
  <?php
        require_once("connection.php");
	require "header.php";
	if (isset($_POST["create"])) {
            $title = $_POST["title"];
            $catalog = $_POST["catalog"];
            $times = date('Y/m/d h:m:s');
            $subtitle = $_POST["subtitle"];
            $description = $_POST["content"];
            $author_id = 1;
	    $image = addslashes(file_get_contents($_FILES["file-input"]["tmp_name"]));
            if ($title == "" || $catalog == "" || $subtitle == "") {
                echo "Please enter your complete information";
            }
		    else{
                if($catalog =="C++")
                    $category_id =1;
		        else{
                    if($catalog =="Java")
                        $category_id =2;
			        else
                        $category_id = 3;
                    }
	
		
		
		$sqll = "SELECT u_id FROM users WHERE username= '".$_SESSION["username"]."' ";
		$result = $connection->query($sqll);
		if ($result->num_rows > 0) {
       			while($row = $result->fetch_assoc()) {
			$author_id = $row['u_id'];
            		}
		}
	
		
		
                $sql = "INSERT INTO post(title,subtitle,content,created_at,category_id,author_id,image)VALUES ('".$title."','".$subtitle."','".$description."','".$times."','".$category_id."','".$author_id."','".$image."')";
                mysqli_query($connection,$sql);
                }  
        }
    ?>

  <!-- New Post Section Begin -->
  <section class="mt-5">
    <div class="container rounded bg-white p-5">
    <form action="" method="post" style="width: 100%; " enctype="multipart/form-data">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h4>New post</span></h4>
                </div>
            </div>
        </div>
        <div class="row">
          
            <div class="form-group col-lg-8 col-md-8">
              <label for="title" class="text-left font-weight-bold">Title</label>
              <input type="text" name="title" id="title" class="form-control"
                  placeholder="Title">
          </div>
          <div class="form-group col-lg-4 col-md-4">
              <label for="catalog" class="text-left font-weight-bold">Catalog</label>
              <select class="form-control" name="catalog" id="catalog">
                  <option>C++</option>
                  <option>Java</option>
                  <option>Python</option>
              </select>
          </div>
      </div>
      <div class="row">
          <div class="form-group col-3">
              <div class="font-weight-bold label">Images</div>
              <div class="row">
                  <div id="preview"></div>
                  <label class="btn" id="hide-input">
                      <img src="img/newImage.png" style="width: 80px;"
                          alt="Add new image">
                      <input id="file-input" name="file-input" type="file" hidden>
                  </label>
              </div>
              <script type="text/javascript">
                  var evImage = document.getElementById('file-input');
                  evImage.onchange = function () {
                      var preview = document.querySelector('#preview');

                      if (this.files) {
                          [].forEach.call(this.files, readAndPreview);
                      }

                      function readAndPreview(file) {

                          // Make sure `file.name` matches our extensions criteria
                          if (!/\.(jpe?g|png|gif|jpg)$/i.test(file.name)) {
                              return alert(file.name + " is not an image");
                          } // else...

                          var reader = new FileReader();

                          reader.addEventListener("load", function () {
                              var image = new Image();
                              image.height = 100;
                              image.title = file.name;
                              image.src = this.result;
                              image.classList.add('p-3');
                              preview.appendChild(image);
                          });

                          reader.readAsDataURL(file);

                          document.getElementById('hide-input').style.display = "none";
                      }
                  }
              </script>
          </div>
          <div class="form-group col-9">
              <label for="subtitle" class="text-left font-weight-bold">Subtitle</label>
              <textarea rows="5" class="form-control form-control-line" id="subtitle" name="subtitle" ></textarea>
          </div>
      </div>
      <div class="row">
          <div class="form-group col-12">
              <label for="content" class="font-weight-bold">Description</label>
	<textarea name="content" id="content" rows="10" cols="80">
            This is my textarea to be replaced with CKEditor.
        	</textarea>	
              <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
              <script>
                  CKEDITOR.replace('content');
              </script>
          </div>
      </div>
      <div class="row">
          <div class="col-6 text-right">
              <button name="create" id="create" type="submit" class="btn btn-info">Submit</button>
          </div>
          <div class="col-6 text-left">
              <button type="button" class="btn btn-danger">Cancel</button>
          </div>
      </div>
          </form>
            
    </div>
</section>
<!-- New Post Section End -->

  <?php
  require "footer.php";
?>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/main.js"></script>

</body>

</html>

