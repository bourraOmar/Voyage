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
  <title>Travel Vibe</title>
</head>

<body class=" text-black">
  <header>
    <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800 text-white">
      <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
          <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Travel Vibe</span>
        </a>
        <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1">
          <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
            <li>
              <a href="index.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Home</a>
            </li>
            <li>
              <a href="activite.php" class="block py-2 pr-4 pl-3 text-white rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 dark:text-white">Activite</a>
            </li>
            <li>
              <a href="reservation.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Reservation</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <div class="flex justify-end mr-6 mt-4">
    <button class="py-2 px-4 bg-gray-800 text-white rounded-xl"
      onclick="document.getElementById('addActivitiesform').classList.remove('hidden');document.getElementById('addActivitiesform').classList.add('flex')"><b>+</b> Ajouter Activite</button>
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
          <input style="width: 200px;" class="cursor-pointer my-4 text-sm rounded-lg dark:bg-gray-800  p-2.5 text-white"
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

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST["titre"];
    $description = $_POST["description"];
    $destination = $_POST["destination"];
    $prix = $_POST["prix"];
    $datedebut = $_POST["datedebut"];
    $datefin = $_POST["datefin"];
    $placedisponible = $_POST["placedisponible"];

    $sql = "INSERT INTO activite ( titre, description, destination, prix, date_debut, date_fin, places_desponsibles) 
    VALUES (?,?,?,?,?,?,?)";


    $sqlrepare = mysqli_prepare($conn, $sql);

    $sqlsend = mysqli_stmt_bind_param($sqlrepare, "sssssss", $titre, $description, $destination, $prix, $datedebut, $datefin, $placedisponible);

    if (mysqli_stmt_execute($sqlrepare)) {
      echo '<script type="text/javascript">
            if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
            }
        </script>';

      echo '<script>done</script>';
    } else {
      echo "error" . mysqli_stmt_error($sqlrepare);
    }
  }
  $selectAll = "SELECT * FROM activite";
  $data = mysqli_query($conn, $selectAll);

  if ($data) {
    echo '<div class="grid grid-cols-4">';
    while ($fetch = mysqli_fetch_assoc($data)) {
      echo '<div class="max-w-sm bg-white rounded-lg shadow-lg p-6 m-6">';
      echo '<h2 class="text-2xl text-center font-semibold text-gray-800 mb-4">Tour Details</h2>';
      echo '<div class="space-y-3">';
      echo '<p class="text-lg font-medium text-gray-600"><strong class="text-black">Titre:</strong> ' . $fetch['titre'] . '</p>';
      echo '<p class="text-lg font-medium text-gray-600"><strong class="text-black">Description:</strong> ' . $fetch["description"] . '</p>';
      echo '<p class="text-lg font-medium text-gray-600"><strong class="text-black">Destination:</strong> ' . $fetch["destination"] . '</p>';
      echo '<p class="text-lg font-medium text-gray-600"><strong class="text-black">Prix:</strong> ' . $fetch["prix"] . ' DH</p>';
      echo '<p class="text-lg font-medium text-gray-600"><strong class="text-black">Date de Début:</strong> ' . $fetch["date_debut"] . '</p>';
      echo '<p class="text-lg font-medium text-gray-600"><strong class="text-black">Date de Fin:</strong> ' . $fetch["date_fin"] . '</p>';
      echo '<p class="text-lg font-medium text-gray-600"><strong class="text-black">Places Disponibles:</strong> ' . $fetch["places_desponsibles"] . '</p>';
      echo '</div>';
      echo '<div class="flex justify-around mt-2 ">';
      echo '<button class="py-2 px-4 bg-green-500 text-white rounded-xl"><a href="reservation.php">delet</a></button>';
      echo '<button class="py-2 px-4 bg-red-500 text-white rounded-xl"><a href="reservation.php">Edite</a></button>';
      echo '</div>';
      echo '</div>';
    }
    echo '</div>';
  }
  ?>
</body>

</html>

