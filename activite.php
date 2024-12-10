<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap');

  * {
    font-family: "Nunito Sans", sans-serif;
    font-optical-sizing: auto;
    font-weight: 400;
    font-style: normal;
  }

  #title {
    font-family: "Dancing Script", cursive;
    font-optical-sizing: auto;
    font-weight: 600;
    font-style: normal;
  }

  section h2 {
    font-family: "Dancing Script", cursive;
    font-optical-sizing: auto;
    font-weight: 600;
    font-style: normal;
  }
  </style>
  <title>Travel Tales</title>
</head>

<body class=" text-black">
  <header class="bg-[#082a82] bg-cover bg-no-repeat flex justify-between px-24 py-8 items-center">
    <a href="index.php">
      <h2 id="title" class="text-4xl font-bold text-white">Travel Tales</h2>
    </a>
    <nav>
      <ul class="text-white flex gap-8">
        <li><a href="index.php">Home</a></li>
        <li><a href="#">Reservation</a></li>
      </ul>
    </nav>
  </header>

  <div class="flex justify-end mr-6 mt-4">
    <button class="py-4 px-8 bg-blue-600 rounded-xl"
      onclick="document.getElementById('addActivitiesform').classList.remove('hidden');document.getElementById('addActivitiesform').classList.add('flex')">Add activite</button>
  </div>


  <!-- add activities -->
  <div id="addActivitiesform" class="hidden justify-center items-center fixed inset-0 bg-black bg-opacity-30">
    <form method="POST" action=""
      class="flex flex-col justify-center items-center pt-5 w-[500px] bg-white rounded-md py-8">
      <div>
        <label>titre :</label>
        <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="text"
          name="titre" required>
      </div>
      <div>
        <label>description :</label>
        <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="text"
          name="description" required>
      </div>
      <div>
        <label>destination :</label>
        <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="text"
          name="destination" required>
      </div>
      <div>
        <label>prix :</label>
        <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="number"
          name="prix" required>
      </div>
      <div>
        <label>date debut :</label>
        <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="date"
          name="datedebut" required>
      </div>
      <div>
        <label>date fin :</label>
        <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="date"
          name="datefin" required>
      </div>
      <div>
        <label>place disponible :</label>
        <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="number"
          name="placedisponible" required>
      </div>
      <div>
        <div>
          <input style="width: 200px;" class="cursor-pointer my-4 text-sm rounded-lg dark:bg-[#082a82] p-2.5 text-white"
            type="submit">
          <a><input style="width: 200px;"
              class="cursor-pointer my-4 text-sm rounded-lg dark:bg-gray-400 p-2.5 text-white" type="button"
              value="Cancel" onclick="document.getElementById('addActivitiesform').classList.remove('flex');
              document.getElementById('addActivitiesform').classList.add('hidden')"></a>
        </div>
      </div>
    </form>
  </div>


  <?php
  include 'connect.php';
  
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $titre = $_POST["titre"];
    $description = $_POST["description"];
    $destination = $_POST["destination"];
    $prix = $_POST["prix"];
    $datedebut = $_POST["datedebut"];
    $datefin = $_POST["datefin"];
    $placedisponible = $_POST["placedisponible"];

    $sql= "INSERT INTO `activite` (titre, description, destination, prix, date_debut, date_fin, places_desponsibles) 
    VALUES (?,?,?,?,?,?,?)";
    

    $sqlrepare = mysqli_prepare($conn, $sql);
    
    $sqlchil3ba = mysqli_stmt_bind_param($sqlrepare, "sssssss", $titre, $description, $destination, $prix, $datedebut, $datefin, $placedisponible);

      if(mysqli_stmt_execute($sqlrepare)){
        echo '<script type="text/javascript">
            if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
            }
        </script>';

        echo '<script>done</script>';
      }else{
        echo "waaaaaa" . mysqli_stmt_error($sqlrepare);
      }
  }
  $selectall = "SELECT * FROM activite";
  $data = mysqli_query($conn, $selectall);

  if($data){
    while($fetch = mysqli_fetch_assoc($data)){
      echo('<div>');
      echo('titre :'. $fetch['titre'] .'<br>');
      echo('description :'. $fetch['description'] .'<br>');
      echo('destination :'. $fetch['destination'] .'<br>');
      echo('prix : '. $fetch['prix'] .'<br>');
      echo('datedebut : '. $fetch['date_debut'] .'<br>');
      echo('datefin  : '. $fetch['date_fin'] .'<br>');
      echo('placedisponible : '. $fetch['places_desponsibles'] .'<br>');
      echo('</div>');
    }
  }
  ?>
</body>

</html>