<?php
session_start();
include 'connect.php';
?>

<div style="min-height: 100vh; display: flex; flex-direction: column; justify-content: space-between;">
  <div style="text-align:center; padding:2%;">
    <p style="font-size:30px; font-weight:bold;">
      Welcome to Movie Recommendation
      <?php 
        if(isset($_SESSION['email'])){
          $email = $_SESSION['email'];
          $query = mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");
          while($row = mysqli_fetch_array($query)){
            echo $row['firstName'].' '.$row['lastName'];
          }
        }
      ?>
      :)
    </p>

    <!-- Movie Catalog centrado y más grande -->
    <h1 style="font-size:50px; font-weight:bold; margin: 40px 0 10px;">🎬 Movie Catalog</h1>

    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 20px; padding: 20px;">
      <?php
        $movies = [
          ["title" => "Toy Story", "img" => "https://upload.wikimedia.org/wikipedia/en/1/13/Toy_Story.jpg", "trailer" => "https://www.youtube.com/watch?v=v-PjgYDrg70"],
          ["title" => "The Lion King", "img" => "https://upload.wikimedia.org/wikipedia/en/3/3d/The_Lion_King_poster.jpg", "trailer" => "https://www.youtube.com/watch?v=lFzVJEksoDY"],
          ["title" => "Finding Nemo", "img" => "https://upload.wikimedia.org/wikipedia/en/2/29/Finding_Nemo.jpg", "trailer" => "https://www.youtube.com/watch?v=wZdpNglLbt8"],
          ["title" => "Coco", "img" => "https://upload.wikimedia.org/wikipedia/en/9/98/Coco_%282017_film%29_poster.jpg", "trailer" => "https://www.youtube.com/watch?v=Rvr68u6k5sI"]
        ];

        foreach($movies as $index => $movie){
          echo '
          <div style="border:1px solid #ccc; border-radius:10px; width:200px; padding:10px; background:#f9f9f9; position:relative;">
            <img src="'.$movie["img"].'" alt="'.$movie["title"].'" style="width:100%; border-radius:10px;">
            <h3 style="font-size:18px; margin-top:10px;">'.$movie["title"].'</h3>
            <button onclick="toggleOptions('.$index.')" style="padding:5px 10px; background:blue; color:white; border:none; border-radius:5px; cursor:pointer;">View</button>
            <div id="options-'.$index.'" style="display:none; margin-top:10px;">
              <a href="https://www.google.com/search?q='.$movie["title"].'+movie+info" target="_blank" style="display:block; color:blue; text-decoration:none; margin:5px 0;">📄 Ver Información</a>
              <a href="'.$movie["trailer"].'" target="_blank" style="display:block; color:red; text-decoration:none;">▶️ Ver Trailer</a>
            </div>
          </div>';
        }
      ?>
    </div>
  </div>

  <!-- Botón Logout al fondo centrado -->
  <div style="text-align:center; margin-bottom: 20px;">
    <a href="logout.php" style="font-size:16px; color:blue;">Logout</a>
  </div>
</div>

<script>
  function toggleOptions(index) {
    const optionsDiv = document.getElementById('options-' + index);
    optionsDiv.style.display = optionsDiv.style.display === 'none' ? 'block' : 'none';
  }
</script>
