<?php
session_start();
include 'configgen.php';


if (isset($_REQUEST['id'])){
$edit_flag=true;
$sql = "SELECT * from users where id=".$_REQUEST['id'];
$res=mysqli_query($conn,$sql);
if($res){

$row = mysqli_fetch_array($res);
//$a=$row["fid"];
//$b=explode(",",$a);
}
}else{
    $edit_flag=false;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
   
    <title>welcome</title>
  </head>
  <body style="background-color:#FFE3D8">
  <nav style="background-color:  #262A53" class="navbar navbar-expand-lg navbar-light" >
  <div class="container-fluid">
    <a class="navbar-brand text-warning" href="#">systemlogin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
          <!--welcome user-->
         
        <li class="nav-item">
          <a class="nav-link active text-warning" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-warning" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-warning" href="#">Pricing</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-warning" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown link
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="register.php">register</a></li>
            <li><a class="dropdown-item" href="logout.php">switch account</a></li>
            <li><a class="dropdown-item" href="logout.php">logout</a></li>
          </ul>
        </li>
      </ul>

    </div>
 
  <div class="navbar-collapse collapse">
    <ul class="navbar-nav ml-auto">
    <li class="nav-item" style="
    border-left-width: 8888‒;
    border-left-width: 0‒;
    padding-left: 550px;
    margin-left: 0px;
">
    </li>
          
    </ul>
</div>
</div>
</nav>

<div class="container my-4">
     <h1 class="text-center">Edit</h1>
     <form action="<?php if (!$edit_flag) echo 'register.php'; else echo 'updatenew.php';?>" method="post"  enctype="multipart/form-data">
<?php if ($edit_flag) { ?>
<input name="id" value=<?php echo $_REQUEST['id']; ?> type="hidden">

<?php
}
?>
       <div class="col-md-6">
    <label for="inputEmail4" class="form-label">username</label>
    <input type="text" class="form-control" name="username" id="username" value="<?php if ($edit_flag) echo $row['username']; ?>">
  </div>
        
  <div class="col-12">
    <label for="inputAddresss5" class="form-label">student name</label>
    <input type="text" name="stuname" class="form-control" id="inputAddress5" value="<?php if ($edit_flag) echo $row['stuname']; ?>"  >
  </div>
             
                    <div class="form-group">
                        <label for="email"> <strong> Student Email</strong></label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email" value="<?php if ($edit_flag) echo $row['email']; ?>">
                    </div>

                    <div class="form-group">
                    <label for="email"> <strong> Gender</strong> </label>
                    <label for="male" class="radio-inline"><input type="radio" name="gender" value="m" 
                    <?php if($row['gender']=='m') echo 'CHECKED' ?> id="male"><strong>Male</label>
                    <label for="Female" class="radio-inline"><input type="radio" name="gender" value="f" <?php if($row['gender']=='f') echo 'CHECKED' ?> id="Female"><strong>Female</strong></label>
                    <label for="Others" class="radio-inline"><input type="radio" name="gender" value="o" <?php if($row['gender']=='o') echo 'CHECKED' ?> id="Others"><strong>Others</strong></label> 
                   </div>

                    <div class="mb-3">
                <lebel for="religion"><strong>Religion:</strong></lebel>
                <select name="rele" class="form-select" aria-label="Default select example">
                  <option selected>Select your religion</option>
                  <?php
                      //include 'partials/_dbconnect.php';
                        $sql="SELECT rel_id, rel_name FROM religion";
                        $result=mysqli_query($conn,$sql);
                        
                        while ($rele= mysqli_fetch_assoc($result)) {
                            if ($row['rel_id']==$rele['rel_id']) $religion_selected = 'SELECTED';
                            else  $religion_selected = '';
                        ?>
                        <option <?php echo $religion_selected; ?>  value="<?php echo $rele["rel_id"]; ?>"><?php echo $rele["rel_name"]; ?></option>
                        <?php
                      }
                      ?>
                  </select>
            </div>



            <div class="mb-3 form-value-container">
                <label for="facility" class="form-label" name="facilities"><strong>Facilities availed:</strong></label>
                  <br>
                  <?php
                   // include 'partials/_dbconnect.php'; 
                    $sql_facility="SELECT fac_id,fac_name FROM facility";
                    $result_facility=mysqli_query($conn,$sql_facility);
                    while($rel_facility=mysqli_fetch_assoc($result_facility)){
                      $facility_selected = '';
                      if($edit_flag){
                        $sel_query="select fac_ic from facility_user where id =".$_REQUEST['id']." and fac_ic=".$rel_facility['fac_id'];
                        $res2=mysqli_query($conn,$sel_query);
                        $fac_row=mysqli_fetch_assoc($res2);
                        if (mysqli_num_rows($res2) > 0 ) $facility_selected = 'CHECKED';
                        else $facility_selected = '';
                      //if ($fac_row['fid']==$rel_facility['fid']) 
                      //$facility_selected = 'CHECKED';
                        }
                     // }
                      ?>
                      <div class="form-check form-check-inline ms-3 col-3">
                      <input class="form-check-input" type="checkbox" <?php echo $facility_selected; ?> name="facility[]" value="<?php echo $rel_facility["fac_id"]; ?>">
                      <label class="form-check-label" for="inlineCheckbox"><?php echo $rel_facility["fac_name"]; ?></label>
                      </div>


                      <?php
                    }
                
                  ?>                 
            </div>


            
<!-- 
    <div class="mb-3">
  <label for="formFile" class="form-label">Upload File </label>
  <input class="form-control" type="file" name="img" id="formFile">
</div>
   
                         -->


         
        <button type="submit" class="btn btn-primary">Update</button>
     </form>
    </div> 

     <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
  </body>
  </html>


