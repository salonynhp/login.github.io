<?php
  session_start();
  if(isset($_GET['id'])){
    $_SESSION['edit']=true; //This is set as false because Profile is not yet Updated
  }
  else{
    unset($_SESSION['edit']);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">

    <title>login2</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">systemlogin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown link
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="register.php">register</a></li>
            <li><a class="dropdown-item" href="#">login</a></li>
            <li><a class="dropdown-item" href="logout.php">logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!--form-->
<div class="container mt-4";>
    <h3>resister here</h3>
    <hr>
<form  action="newsubmitgen.php" method="post" class="row g-3" enctype="multipart/form-data">


          <?php
                include 'configgen.php';
                if(isset($_SESSION['edit'])){
                    $student_id=$_GET['id'];
                    $_SESSION['reset_student_id']=$student_id;
                    $sqla="SELECT * FROM users,religion
                            WHERE users.student_id=$student_id
                            AND users.rel_id=religion.rel_id";
                           
                    $resa=mysqli_query($conn,$sqla);
                    $sqla_arr=mysqli_fetch_assoc($resa);
                }
            ?>
            <?php
                //include 'connection.php';
                if(isset($_SESSION['edit'])){
                    $sqlb="SELECT facility_user.fac_ic 
                            FROM facility_user 
                            WHERE facility_user.id=$student_id";
                    $resb=mysqli_query($conn,$sqlb);
                    while($sqlb_arr=mysqli_fetch_assoc($resb)){
                        $sqlbi_arr[]=$sqlb_arr['fac_ic'];
                    }
                }
            ?>



  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">username</label>
    <input type="text" class="form-control" name="username" id="inputEmail4"
    <?php if(isset($_SESSION['edit'])){ ?> value="<?php echo $sqla_arr['stuname'] ?>" <?php } ?> required>
              
  </div>
  <div class="col-md-6">
    <label for="inputpassword4" class="form-label">password</label>
    <input type="password" class="form-control" name="password" id="inputpassword4">
  </div>
 
  <div class="col-12">
    <label for="inputAddress2" class="form-label">email id</label>
    <input type="email" name="email" class="form-control" id="inputAddress2" 
    <?php if(isset($_SESSION['edit'])){ ?> value="<?php echo $sqla_arr['email'] ?>" <?php } ?> required>
              <p class="text-danger" ><i class="fas fa-exclamation-circle"> </i> Enter a valid email</p>
  </div>
  <div class="col-12">
    <label for="inputAddresss5" class="form-label">student name</label>
    <input type="text" name="stuname" class="form-control" id="inputAddress5" 
    <?php if(isset($_SESSION['edit'])){ ?> value="<?php echo $sqla_arr['student_name'] ?>" <?php } ?> required>
              
  </div>
  <div class="col-12">
    //<label for="gender" class="form-label">gender</label>
    <!-- <input type="text" name="stuname" class="form-control" id="inputAddress6" > -->
                  //<div class="form-check form-check-inline ms-3">
                       <!-- <?php if(isset($_SESSION['edit']) && $sqla_arr['gender']=='male'){ ?>
                        <input type="radio" name="gender" id="gender" value="male"checked>
                        <?php }else{ ?>
                          <input type="radio" name="gender" id="gender" value="male">
                          <?php } ?>
                          <label class="form-check-label " for="inlineRadio1">Male</label>
                    </div>
                  <div class="form-check form-check-inline ms-3 ">
                        <?php if(isset($_SESSION['edit']) && $sqla_arr['gender']=='F'){ ?>
                              <input class="form-check-input c5" type="radio" name="gender" id="gender" value="female" checked>
                          <?php }else{ ?>
                              <input class="form-check-input c5" type="radio" name="gender" id="gender" value="female">
                          <?php } ?>
                          <label class="form-check-label " for="inlineRadio2">Female</label>
                  </div>

  </div>

  <div class="mb-3 form-value-container">
                <lebel for="gender" >Gender <spsan class="star-required">*</spsan></lebel>
                  <div class="form-check form-check-inline ms-3">
                    <?php if(isset($_SESSION['edit']) && $sqla_arr['gender']=='M'){ ?>
                        <input class="form-check-input c5" type="radio" name="Gender" id="male" value="M" checked>
                    <?php }else{ ?>
                        <input class="form-check-input c5" type="radio" name="Gender" id="male" value="M">
                    <?php } ?>
                    <label class="form-check-label " for="inlineRadio1">Male</label>
                  </div>
                  <div class="form-check form-check-inline ms-3 ">
                    <?php if(isset($_SESSION['edit']) && $sqla_arr['gender']=='F'){ ?>
                        <input class="form-check-input c5" type="radio" name="Gender" id="female" value="F" checked>
                    <?php }else{ ?>
                        <input class="form-check-input c5" type="radio" name="Gender" id="female" value="F">
                    <?php } ?>
                    <label class="form-check-label " for="inlineRadio2">Female</label>
                  </div>
     </div>

     <div class="mb-3 form-value-container">
                <label for="facility" class="form-label" name="facilities">Facilities availed <spsan class="star-required">*</spsan></label>
                  <br>
                  <?php
                    //include 'connection.php';
                    $sql_facility="SELECT facility_id,facility_name
                    FROM facilities_master";
                    $result_facility=mysqli_query($conn,$sql_facility);

                    while($rel_facility=mysqli_fetch_assoc($result_facility)){
                    ?>
                        <div class="form-check form-check-inline ms-3 col-lg-3 col-6">
                            <?php if(isset($_SESSION['edit']) && in_array($rel_facility["facility_id"], $sqlbi_arr)){ ?>
                                    <input class="form-check-input" type="checkbox" name="facility[]" value="<?php echo $rel_facility["facility_id"]; ?>" checked>  
                            <?php }else{ ?>
                                    <input class="form-check-input" type="checkbox" name="facility[]" value="<?php echo $rel_facility["facility_id"]; ?>">
                            <?php } ?>
                            <label class="form-check-label c7" for="inlineCheckbox"><?php echo $rel_facility["facility_name"]; ?></label>
                        </div>
                        <?php 
                    }
                
                  ?>
                 
        </div> 

        <div class="mb-3 form-value-container">
                <lebel for="religion">Religion <spsan class="star-required">*</spsan></lebel>
                <select name="religion" class="form-select mt-2" aria-label="Default select example">
                  <option>Select your religion</option>
                  <?php
                        //include 'connection.php';
                        $sql="SELECT religion_id,religion_name
                        FROM religion_master";
                        $result=mysqli_query($conn,$sql);
                        
                        while ($rel= mysqli_fetch_assoc($result)) {
                            if(isset($_SESSION['edit']) && $sqla_arr['religion_id']==$rel["religion_id"]){ ?>
                                <option class="c8" value="<?php echo $rel["religion_id"]; ?>" selected><?php echo $rel["religion_name"]; ?></option>
                            <?php }else{ ?>
                                <option class="c8" value="<?php echo $rel["religion_id"]; ?>" ><?php echo $rel["religion_name"]; ?></option>
                            <?php }
                      }
                      ?>
                </select>
               
            </div> 
                  