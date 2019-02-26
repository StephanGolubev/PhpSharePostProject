<?php
   include('session.php');
?>

  <head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/second.css">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <style>
    #hello{
    	margin: 76px;
    	align-items: 50%;
    }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="sticky-footer-navbar.css" rel="stylesheet">
  </head>
  <body class="d-flex flex-column h-100">
    <header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="">Stephans site</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="dashboard.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="blogs.php">Blogs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="newblog.php">Creat new blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Log out</a>
        </li>
      </ul>
      <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
</header>


  <div class="container col-lg-8 col-md-12">
      <div class="row">
        <div class="col-lg-8 col-md-12"><br><br><br><br><br><br>
           <?php 
        $newURL = "dashboard.php";
        $creater = $_SESSION["login_user"];
        $user = $_GET['id'];
        $dt = "SELECT * FROM `user` WHERE id=$user";
        $dt1 = "SELECT * FROM `comment` WHERE user_id=$user";
        $dt2 = "SELECT * FROM `blogs` WHERE user_id=$user";
        // Order by DESC-less or ASC-bigger limit-limits the output!
        $result = mysqli_query($db,$dt) or die( mysqli_error($db));
        $result1 = mysqli_query($db,$dt1) or die( mysqli_error($db));
        $result2 = mysqli_query($db,$dt2) or die( mysqli_error($db));
    ?>
        <?php
        while ($row = mysqli_fetch_array($result)) {
          $get = array("id"=>"{$row['id']}");
          echo "<div id='rows'><h4>{$row['fname']}    {$row['lname']}<br></h4>Registered: {$row['created']}</p><br><br><div><hr>";
        }
        ?>
        <div class="col-lg-8 col-md-12">
          <h4>Users blogs:</h4><br>
        </div>
        <?php
        while ($row = mysqli_fetch_array($result2)) {
          $get = array("id"=>"{$row['id']}");
          $out = http_build_query($get);
          $url = "blogdetail.php?".$out."";
          echo "<div id='rows'><h4><a href='$url'>{$row['title']}</a></h4><p id='user'>Created: {$row['created']}</p><br>{$row['body']}<br><div><hr>";
        }
        ?>
        <div class="container">
          <h4>Users comments:</h4><br>
        </div>
        <?php
        while ($row = mysqli_fetch_array($result1)) {
          $get = array("id"=>"{$row['post_id']}");
          $out = http_build_query($get);
          $url = "blogdetail.php?".$out."";
          echo "<div id='rows'><h4><a href='$url'>{$row['body']}</a></h4><p id='user'>Created: {$row['posted']}</p><hr>";
        }
        ?>
        </div>
        <div class="col-4" id="main"><br><br><br><br><br><br>
          <?php 
          if (!isset($_SESSION['new_blog_title']) || $_SESSION['new_blog_title'] == '') {
            echo "<h6>You have not created any post yet!</h6>";
          }else{
            echo "<h6>You have just created new post :<br><font size='5' color='red' face='Arial'>". $_SESSION['new_blog_title']."</font></h6>";
          }

           ?>
          
        </div>
      </div>
  </div>
</main>

<footer class="footer mt-auto py-3">
  <div class="container">
    <p align="center">&copy;Stephans site</p>
  </div>
</footer>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</html>