<?php
   include('session.php');
?>

  <head>
    <meta charset="utf-8">
    <title>All blogs</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<style>
      #search-data{
        padding: 10px;
        border: solid 1px #BDC7D8;
        margin-bottom: 20px;
        display: inline;
        width: 100%;
      }
      .search-result{
        border-bottom:solid 1px #BDC7D8;
        padding:10px;
        font-family:Times New Roman;
        font-size: 20px;
        color:blue;
      }
    </style>
    <script>
      $(document).ready(function() {
        $('#search-data').unbind().keyup(function(e) {
          var value = $(this).val();
          if (value.length>3) {
            searchData(value);
          }
          else {
            $('#search-result-container').hide();
          }
        }
                                        );
      }
                       );
      function searchData(val){
        $('#search-result-container').show();
        $('#search-result-container').html('<div><img src="../img/preloader.gif" width="50px;" height="50px"> <span style="font-size: 20px;">Please Wait...</span></div>');
            $.post('controller.php',{
          'search-data': val}
               , function(data){
          if(data != "")
            $('#search-result-container').html(data);
          else    
            $('#search-result-container').html("<div class='search-result'>No Result Found...</div>");
        }
              ).fail(function(xhr, ajaxOptions, thrownError) {
          //any errors?
          alert(thrownError);
          //alert with HTTP error
        }
                    );
      }
    </script>

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
    #rows{
      background-color: #f5f5f0;
      }
    #user{
      color:#595959;
      font-family: Courier New, monospace;
    }
    }
    .dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  position: absolute;
  background-color: #f1f1f1;
  min-width: 30000px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #3e8e41;}
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
      <div class="dropdown" style="margin-top: -19px;">
  <button class="btn btn-outline-success my-2 my-sm-0" type="button" >Search result</button>
  <div class="dropdown-content">
    <div id="search-result-container" style="border:solid 1px #BDC7D8;display:none; "></div>
  </div>
</div>
      <div class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-1" type="text" id="search-data" name="searchData" placeholder="Search By Post Title (word length should be greater than 3) ..." autocomplete="off" aria-label="Search">
      </div>
      
      </div>
    </div>
  </nav>
</header><br><br><br><br><br><br><br>


<main role="main" class="flex-shrink-0">
  <div class="container" id="hello">
    
    <?php 
	echo "<h1 class='mt-5'>Hello " . $_SESSION["login_user"] . ".</h1><br><h4> Here you can see all the blog were writen:</h4>";
 ?>
  </div>
  <div class="container">
      <div class="row">
        <div class="col-lg-2" id="main">
          <?php 
          if (!isset($_SESSION['new_blog_title']) || $_SESSION['new_blog_title'] == '') {
            echo "<h6>You have not created any post yet!</h6>";
          }else{
            echo "<h6>You have just created new post :<br><font size='5' color='red' face='Arial'>". $_SESSION['new_blog_title']."</font></h6>";
          }
           ?>
         </div> <hr>
        <div class="col-lg-10 col-md-12">
          <?php 
   			$newURL = "dashboard.php";
   			$creater = $_SESSION["login_user"];
   			$x=0;


   			$dt = "SELECT * FROM `blogs` ORDER BY `created` DESC LIMIT 5";
        // Order by DESC-less or ASC-bigger limit-limits the output!
   			$result = mysqli_query($db,$dt) or die( mysqli_error($db));
    ?>
    <div>
        <?php
        while ($row = mysqli_fetch_array($result)) {
          $get = array("id"=>"{$row['id']}");
          $out = http_build_query($get);
          $url = "blogdetail.php?".$out."";
          echo "<div id='rows'><h4><a href='$url'>{$row['title']}</a></h4><div id='user'>Creator: {$row['user']}</div><p id='user'>Created: {$row['created']}</p><br>{$row['body']}<br><div><hr>";
        }
        ?>
        </div>
        </div>
        
      </div>

  </div>
</main>

<footer class="footer mt-auto py-3">
  <div class="container">
    <span class="text-muted">Place sticky footer content here.</span>
  </div>
</footer>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</html>