<?php 
  session_start();

  include 'db.php';

    if(isset($_GET['id'])) 
    {
      $id = $_GET['id'];
      $select = "select * from `admin` where `id`=".$id;
      $res = mysqli_query($con, $select);
      $data = mysqli_fetch_assoc($res);
      $user_id = $_SESSION['username']['id'];  

    }
    if(isset($_POST['submit'])) 
    {

      $user_id = $_SESSION['username']['id'];  
      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $imagename = $_FILES['image']['name']; 
       
      if($imagename == "")
      {
        $image = @$data['image'];
      }
      else
      {
        if(!$imagename == "")
        {
          unlink("../image/admin/".@$data['image']);
        }
        $image = rand(1000,9999).$imagename;
        $path ="../image/admin/".$image;
        move_uploaded_file($_FILES['image']['tmp_name'], $path);
      }
      $select = "select * from `admin` where email='$email'";
      $select_res = mysqli_query($con,$select);
      $semail=mysqli_fetch_assoc($select_res);
      $rec = mysqli_num_rows($select_res);
   
    if(isset($_GET['id'])) 
    { 
        if($rec==0)
        {
          $update = "update `admin` set `name`='$name',`email`='$email',`image`='$image' where `id`=".$_GET['id'];
          mysqli_query($con, $update);
          header("location:view_admin.php");
          if($user_id==$id)
          {
            header("location:logout.php");
          } 
        }
        else
        {
          if($semail['id']==$id)
          {
            $update = "update `admin` set `name`='$name',`image`='$image' where `id`=".$_GET['id'];
            mysqli_query($con, $update);
            header("location:view_admin.php");
          }
          else
          {
            $error = "Email Already Exist........!";
          }
        }
          
    }
    else 
    {
        if($rec==0)
        {
          $insert = "insert into `admin`(`name`,`email`,`password`,`image`)values('$name','$email','$password','$image')";
          mysqli_query($con,$insert);
          header("location:view_admin.php");
        }
        else
        {
          $error = "Email Already Exist......!";
        }
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
  h2
  {
    color: red;
    display: none;
  }
  .btncha
  {
    background-color: #007bff;
    color: white;
    padding: 5px;
  }
  .btncha:hover
  {
    color: #007bff;
    background-color: skyblue;
  }

</style>
<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Admin</li>
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
                <h3 class="card-title">Add Admin</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data" id="frm">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" id="uname"  value="<?php echo @$data['name']; ?>" class="form-control" id="exampleInputName1" placeholder="Enter name">
                    
                    <span>Enter your name......!</span>

                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" id="email" value="<?php echo @$data['email']; ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                    
                    <span>Enter your Email......!</span>


                    <h5 style="color:red;"><?php echo @$error; ?></h5>
                  </div>



                  <!-- <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" id="pass" value="<?php echo @$data['password']; ?>" class="form-control" id="exampleInputPassword1" placeholder="Password">n

                    <span>Enter password......!</span>

                  </div> -->
                  <?php 
                    if(!isset($_GET['id']))
                    {
                   ?>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" id="pass" value="<?php echo @$data['password']; ?>" class="form-control" id="exampleInputPassword1" placeholder="Password">

                    <span>Enter password......!</span>

                  </div>
                  <?php 
                    }
                    else if($id==$user_id)
                    {

                   ?>
                    <div class="form-group">
                    <label for="exampleInputPassword1">Change Password</label><br>
                    <a href="current_password.php" class="btncha">Change password</a>
                  </div>
                  <?php 
                    } 
                  ?>


                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <!-- <div class="input-group">
                        
                        <input type="file" name="image" id="img"  class="custom-file-input" >
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        
                        <h2>Enter image.....!</h2>

                    </div> -->
                     <div class="input-group">
                        <input type="file" name="image" id="img" class="custom-file-input" id="exampleInputFile" >
                      <span>Enter your image.......!</span>

                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                       
                    </div>
                  </div>
                  <!-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div> -->
                        <img src="../image/admin/<?php echo @$data['image']; ?>" id="fimg" width="100px">
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
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php

  include 'footer.php';

?>

<script type="text/javascript">
  
  $('#frm').submit(function(){
    var name = $('#uname').val();
    var email = $('#email').val();
    var e_pat = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;

    var password = $('#pass').val();
    var image = $('#img').val();
    var im = $('#fimg').attr('src')
    if(im!="../image/admin/")
    {
      $('#img').val(im)
    }
    if(name=='')
    {
      $('#uname').next('span').css('display','inline')
      return false;
    }
    if(email=='')
    {
      $('#email').next('span').css('display','inline')
      return false;
    }
    if(password=='')
    {
      $('#pass').next('span').css('display','inline')
      return false;
    }
    if(image=='')
    {
      $('#img').next('span').css('display','inline')
      return false;
    }
  })


</script>