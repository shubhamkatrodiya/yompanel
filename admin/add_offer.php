<?php 
  session_start();
    include 'db.php';


    if(isset($_GET['id'])) {
      $id = $_GET['id'];
      $select = "select * from `offer` where `id`=".$id;
      $res = mysqli_query($con, $select);
      $data = mysqli_fetch_assoc($res);
      
    }

    if(isset($_POST['submit'])) {
    $user_id = $_SESSION['username']['id'];  
    $icon = $_POST['icon'];
    $titel = $_POST['titel'];
    $description = $_POST['description'];
    
    if(isset($_GET['id'])) {
      $update = "update `offer` set `icon`='$icon',`titel`='$titel',`description`='$description' where `id`=".$_GET['id'];
      mysqli_query($con, $update);
        header("location:offer.php");

    }
    else {

      $insert = "insert into `offer`(`icon`,`titel`,`description`)values('$icon','$titel','$description')";
      mysqli_query($con,$insert);
    }
    header("location:view_offer.php");
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
            <h1>ADD OFFER</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">WHAT WE OFFER</li>
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
                <h3 class="card-title">Add offer</h3>
              </div>
              
              <form method="post" id="frm">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputIcon1">Icon</label>
                    <input type="text" name="icon" id="uname" value="<?php echo @$data['icon']; ?>" class="form-control" id="exampleInputIcon1" placeholder="Enter icon">
                    <span>Enter icon....!</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputTitel1">Title</label>
                    <input type="text" name="titel" id="tit" value="<?php echo @$data['titel']; ?>" class="form-control" id="exampleInputTitel1" placeholder="Enter titel">
                    <span>Enter title......!</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputDescription1">Description</label>
                    <input type="text" name="description" id="des" value="<?php echo @$data['description']; ?>" class="form-control" id="exampleInputDescription1" placeholder="Description">
                    <span>Enter description...!</span>
                  </div>
                
                </div>
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>            
          </div>      
        </div>
      </div>
    </section>
  </div>
<?php 
  include 'footer.php';
?>
<script type="text/javascript">
  
  $('#frm').submit(function(){
    var icon = $('#uname').val();
    var titel = $('#tit').val();
    var descripition = $('#des').val();
   

    if(icon=='')
    {
      $('#uname').next('span').css('display','inline')
      return false;
    }
    if(titel=='')
    {
      $('#tit').next('span').css('display','inline')
      return false;
    }
    if(descripition=='')
    {
      $('#des').next('span').css('display','inline')
      return false;
    }
    
  })


</script>