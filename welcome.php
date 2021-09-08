
<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!==true)
{
    header("location: login.php");
    exit;
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
          <a class="nav-link text-warning" href="../login2/register.php">registration </a>
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
          <a class="nav-link text-warning" href="profilegen.php"><img src="https://img.icons8.com/bubbles/50/000000/user.png" alt="account details">welcome salony</a>
    </li>
          
    </ul>
</div>
</div>
</nav>

<!---->
<div  class="container mt-4";>
    <h3><?php echo "welcome ".$_SESSION['username']?>!you can now use this website</h3>
    <hr>
   
</div>
<!--carousel-->
<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active img-fluid" data-bs-interval="10000">
      <img src="https://d-line.biz/pictures/articles/articles_thumbnail_zz0HmWebi5.jpg" class="d-block w-100" alt="the-buzz-img3"  style="width:640px;height:360px">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item img-fluid" data-bs-interval="2000">
      <img src="https://kinsta.com/wp-content/uploads/2021/03/best-programming-language-to-learn-1024x512.png" class="d-block w-100" alt="the-buzz-img3"  style="width:640px;height:360px">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item img-fluid">
      <img src="https://kinsta.com/wp-content/uploads/2020/03/php-tutorials-1024x512.png" class="d-block w-100" alt="the-buzz-img3"  style="width:640px;height:360px">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!--separation-->

<div class="col-md-12 offers"> 
          <img data-src="" class="lazyload img-fluid offers-gif" src=""> 
          <div class="offers-section">
            <div class="main-offers-circle">
              <div class="offers-circle-inner">
               <div class="offer-text">
                 
               </div>
             <div class="offer-image">    <img src="image/catalog/elements/offer-image.png" class="lazyload img-fluid" alt="">
                  </div> 
              </div>
            </div>
              </div></div>
<!--cards-->

<div class="container-fluids" style="margin-left: 30px; margin-right: 30px; ">
        <div class="row">
            <div class="col-sm-3 mb-4">
                <div class="card" style="background-color:#FFBD9B">
                    <img class="card-img-top" src="" alt="" >
                     
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">
                            Some quick example text to build on 
                            the card title and make up the bulk 
                            of the card's content.
                        </p>
  
                        <a href="#" class="btn btn-outline-primary btn-sm">
                            Card link
                        </a>
                        <a href="#" class="btn btn-outline-secondary btn-sm">
                            <i class="far fa-heart"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mb-4">
                <div class="card" style="background-color:#107595">
                    <img class="card-img-top" src="" alt="">
  
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">
                            Some quick example text to build on the 
                            card title and make up the bulk of the 
                            card's content.
                        </p>
                          
                        <a href="#" class="btn btn-outline-primary btn-sm">
                            Card link
                        </a>
                        <a href="#" class="btn btn-outline-secondary btn-sm">
                            <i class="far fa-heart"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mb-4">
                <div class="card">
                    <img class="card-img-top" src="" alt="" >
                     
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">
                            Some quick example text to build on 
                            the card title and make up the bulk 
                            of the card's content.
                        </p>
  
                        <a href="#" class="btn btn-outline-primary btn-sm">
                            Card link
                        </a>
                        <a href="#" class="btn btn-outline-secondary btn-sm">
                            <i class="far fa-heart"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mb-4">
                <div class="card">
                    <img class="card-img-top" src="" alt="">
  
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">
                            Some quick example text to build on the 
                            card title and make up the bulk of the 
                            card's content.
                        </p>
                          
                        <a href="#" class="btn btn-outline-primary btn-sm">
                            Card link
                        </a>
                        <a href="#" class="btn btn-outline-secondary btn-sm">
                            <i class="far fa-heart"></i></a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <!--separation-->

<div class="col-md-12 offers"> 
          <img data-src="" class="lazyload img-fluid offers-gif" src=""> 
         <div class="offers-section">
             <div class="main-offers-circle">
               <div class="offers-circle-inner">
                   <div class="offer-text">
                 
                   </div>
                   <div class="offer-image">    <img src="image/catalog/elements/offer-image.png" class="lazyload img-fluid" alt="">
                   </div> 
               </div>
             </div>
         </div>
 </div>

<div class="container  bg-warning text-dark">
</div>




    <!--data table-->
<div class="container">
  <div class="clearfix tablebox table-responsive">
    <table id="student_info" class="table display">
      <thead>
        <tr>
          <th>username</th>
          <th>password</th>
          <th>emails</th>
          <th>student_name</th>
          <th> gender</th>
          <th>religion</th>
          <th>facilities</th>
          <th>edit/delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include 'configgen.php';
        $sql="SELECT * FROM users,religion 
        WHERE users.rel_id=religion.rel_id";
        $res=mysqli_query($conn,$sql);
        while($sql_arr=mysqli_fetch_assoc($res)){
          ?>
          <tr>
            <td><?php echo $sql_arr['username']?></td>
            <td><?php echo $sql_arr['password']?></td>
            <td><?php echo $sql_arr['email']?></td>
            <td><?php echo $sql_arr['stuname']?></td>
            <td><?php echo $sql_arr['gender']?></td>
            <td><?php echo $sql_arr['rel_name']?></td>
            <td> <?php
                      // $sqli=" SELECT group_concat(fac_name SEPARATOR '; ') FROM `facility_user` sf,`facility` fm 
                      // WHERE id=".$sql_arr['id']." and sf.fac_ic=fm.fac_id";
                      $facility_name='';
                      $sqli="SELECT fac_name FROM `facility_user` sf, `facility` fm
                      WHERE id=".$sql_arr['id']." and sf.fac_ic=fm.fac_id";
                       $resi=mysqli_query($conn,$sqli);
                      while($sqli_arr=mysqli_fetch_assoc($resi)){
                        $facility_name.= $sqli_arr['fac_name']. ', ';
                      }

                      echo $facility_name= trim($facility_name, ", ");
                 ?>
            
            
            
            </td>



            <td><?php echo '<a href=editnew.php?id='.$sql_arr['id'].'>edit</a> /<a '?>onclick ="return confirm(are you sure you want to delete this item ?');"<?php echo 'href=delet.php?id='.$sql_arr['id']; ?>>Delete</a></td>       
            
             </tr>
            
            <?php
        }
        ?>

        
      </tbody>

    </table>

  </div>
</div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
    <script>
   $(document).ready(function() {
    $('#student_info').DataTable( {
        scrollY:        '50vh',
        scrollCollapse: true,
        paging:         false
    } );
} );
</script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
  </body>
</html>