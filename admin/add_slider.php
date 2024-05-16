<?php 
  session_start();
  include 'db.php';

  if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = "select * from `slider` where `id`=".$id;
    $res = mysqli_query($con, $select);
    $data = mysqli_fetch_assoc($res);

  }


  if(isset($_POST['submit'])) 
  {
      $user_id = $_SESSION['username']['id'];
      $titel = $_POST['titel'];
      $description = $_POST['description'];
      $imagename = $_FILES['image']['name'];

    if($imagename == ""){
      $image = @$data['image'];
    }
    else
    {
      $image = rand(1000,9999).$imagename;
      $path ="../slider_img/".$image;
      move_uploaded_file($_FILES['image']['tmp_name'], $path);
    }

      if(isset($_GET['id'])) {
        $update = "update `slider` set `titel`='$titel',`description`='$description',`image`='$image' where `id`=".$_GET['id'];
        mysqli_query($con,$update);
        header("location:view_slider.php");

      }
      else
      {
        $insert = "insert into `slider`(`titel`,`description`,`image`)values('$titel','$description','$image')";
        mysqli_query($con,$insert);
      }
  }


  include 'header.php';
?>
<style type="text/css">
  
  span 
  {
    color: red;
    display: none;
  }

</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Slider</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Slider</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Slider</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  method="post" id="frm" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" name="titel" id="uname" value="<?php echo @$data['titel'] ?>"  class="form-control" id="exampleInputTitel1" placeholder="Enter title">
                    
                    <span>Enter your title......!</span>

                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <input type="text" name="description" id="uname1" value="<?php echo @$data['description'] ?>" class="form-control" id="exampleInputDescription1" placeholder="Description">

                    <span>Enter your description.......!</span>
                  
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                        <input type="file" name="image" id="img" class="custom-file-input" id="exampleInputFile">
                        <span>Enter your image.......!</span>

                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    
                      
                    </div>
                  </div> 
                        <img src="../slider_img/<?php echo @$data['image']; ?>" id="fimg" width="100px">
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>        
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php 
  include 'footer.php';
?>

<script type="text/javascript">
  
  $('#frm').submit(function(){
    var titel = $('#uname').val();
    var description = $('#uname1').val();
    var image = $('#img').val();

    var im = $('#fimg').attr('src')
    if(im!="../slider_img/")
    {
      $('#img').val(im)
    }

    if(titel=='')
    {
      $('#uname').next('span').css('display','inline')
      return false;
    }
    if(description=='')
    {
      $('#uname1').next('span').css('display','inline')
      return false;
    }
   
    if(image=='')
    {
      $('#img').next('span').css('display','inline')
      return false;
    }
    
  })


</script>