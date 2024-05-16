<?php 
  session_start();
  
      include 'db.php';



  if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = "select * from `category` where `id`=".$id;
    $res = mysqli_query($con, $select);
    $data = mysqli_fetch_assoc($res);
  }


  if(isset($_POST['submit'])) 
  {
      $category = $_POST['category'];

      $select = "select * from `category` where category='$category'";
      $select_res = mysqli_query($con,$select);
      $rec = mysqli_num_rows($select_res);

      if(isset($_GET['id'])) 
      {
        $update = "update `category` set `category`='$category' where `id`=".$_GET['id'];
        mysqli_query($con,$update);
        header("location:view_category.php");
      }
      else
      {
          if($rec==0)
          {
            $insert = "insert into `category`(`category`)values('$category')";
            mysqli_query($con,$insert);
            header("location:view_category.php");
          }
          else
          {
            $error = "category Already Exist......!";            
          }
      }
      
  }

    $select1 = "select * from `category`";
    $res1 = mysqli_query($con, $select1);
    $data1 = mysqli_fetch_assoc($res1);
    $_SESSION['catid']=$data1;




  include 'header.php';
?>
<style type="text/css">
  
  span 
  {
    color: red;
    display: none;
  }
  h4
  {
    color: red;
    text-align: center;
  }
</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Add category</li>
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
                <h3 class="card-title">Add category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  method="post" id="frm" enctype="multipart/form-data">
                <h4><?php echo @$error; ?></h4>
                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputCategory1">Category</label>
                    <input type="text" name="category" id="uname"  value="<?php echo @$data['category']; ?>" id="exampleInputCategory1" placeholder="Enter Category">

                    <span>Enter your category......!</span>

                  </div>

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
    var name = $('#uname').val();
   

    if(name=='')
    {
      $('#uname').next('span').css('display','inline')
      return false;
    }
    
  })


</script>