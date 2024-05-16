<?php 
  session_start();
  include 'db.php';

  if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = "select * from `post` where `id`=".$id;
    $res = mysqli_query($con, $select);
    $data = mysqli_fetch_assoc($res);
  }

$cat_new  = "select * from `category`";
$cat_res1 = mysqli_query($con,$cat_new);

  if(isset($_POST['submit'])) 
  {
      $name = $_SESSION['username']['name'];
      $imagename = $_FILES['image']['name'];
      $titel = $_POST['titel'];
      // $name = $_POST['name'];
      $date = $_POST['date'];
      $category = $_POST['category'];
      $description = $_POST['description'];


     
      if($imagename == "") {
          $image = $data['image'];
      }
       else
      {
        $image = rand(1000,9999).$imagename;
        $path ="../image/latest_posts/".$image;
        move_uploaded_file($_FILES['image']['tmp_name'], $path);
      }

      if(isset($_GET['id'])) {
        $update = "update `post` set `image`='$image',`titel`='$titel',`name`='$name',`date`='$date',`category`='$category',`description`='$description' where `id`=".$_GET['id'];
        mysqli_query($con,$update);
        header("location:view_post.php");
      }
      else
      {
        $insert = "insert into `post` (`image`,`titel`,`name`,`date`,`category`,`description`)values('$image','$titel','$name','$date','$category','$description')";
        mysqli_query($con,$insert);
        header("location:view_post.php");
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
            <h1>Letest post</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Letest post</li>
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
                <h3 class="card-title">Add post</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  method="post" id="frm" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <!-- <div class="custom-file"> -->
                        <input type="file" id="img" name="image" value="<?php echo @$data['image'] ?>"  class="custom-file-input" >
                        <span>Enter image.........!</span>
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      <!-- </div> -->
                      <!-- <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div> -->
                    </div>
                        <img src="../image/latest_posts/<?php echo @$data['image']; ?>" id="fimg" width="100px">

                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" name="title" id="tit" value="<?php echo @$data['titel'] ?>"  class="form-control" id="exampleInputTitel1" placeholder="Enter title">
                    <span>Enter Title........!</span>
                  </div>
                  <!-- <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name"  value="<?php echo @$data['name']; ?>" class="form-control" id="exampleInputName1" placeholder="Enter name">
                  </div> -->
                  <div class="form-group">
                    <label for="exampleInputDate1">Date</label>
                    <input type="date" name="date" id="date"  value="<?php echo @$data['date']; ?>" class="form-control" id="exampleInputDate1" placeholder="Enter date">
                    <span>Enter Date.....!</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputcategori1">Categori</label>
                    <!-- <input type="text" name="categori" value="<?php echo @$data['categori'] ?>" class="form-control" id="exampleInputCategori1" placeholder="Categori"> -->
                    <select name="category" id="cat" class="form-control">
                      <option selected disabled value="">SELECT CATEGORY</option>
                     
                     <?php 
                      while ($cat = mysqli_fetch_assoc($cat_res1)) 
                      {
                        
                     ?>

                      <option style="color:black;" value="<?php echo @$cat['category']; ?>" <?php if(@$data['category']==$cat['category']){ ?> selected <?php } ?>> <?php echo $cat['category'];?></option>
                      <?php } ?>
                    </select>
                      <span>Enter Category....!</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputDescription1">Description</label>
                    <input type="text" name="description" id="des" value="<?php echo @$data['description'] ?>" class="form-control"  placeholder="Description">
                  <span>Enter Discription..............!</span>
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
    var image = $('#img').val();

    var date = $('#date').val();
    var title = $('#tit').val();
    var cat = $('#cat').val();
    
    var description = $('#des').val();
    // alert(cat)
   var im = $('#fimg').attr('src')
    if(im!="../image/latest_posts/")
    {
      $('#img').val(im)
    }

    if(image=='')
    {
      $('#img').siblings('span').css('display','inline')
      return false;
    }
    if(date=='')
    {
      $('#date').next('span').css('display','inline')
      return false;
    }
    if(title=='')
    {
      $('#tit').next('span').css('display','inline')
      return false;
    }
    if(cat==null)
    {
      $('#cat').next('span').css('display','inline')
      return false;
    }

    if(description=='')
    {
      $('#des').next('span').css('display','inline')
      return false;
    }
        
  })


</script>