<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
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
            <a href="dashbord.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Dashbord</a>
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
  $selectAll = "SELECT * FROM `activite`";
  $data = mysqli_query($conn, $selectAll);
if ($data) {
  echo '<div class="grid md:grid-cols-4 grid-cols-1">';
  while($row = $data->fetch_assoc()){
      echo '<div class="max-w-sm bg-gray-800 rounded-lg shadow-lg p-6 m-6">
      <h2 class="text-2xl text-center font-semibold text-white mb-4">Tour Details</h2>
      <div class="space-y-3">
      <p class="text-lg font-medium text-gray-400"><strong class="text-white">Titre:</strong> ' . $row['titre'] . '</p>
      <p class="text-lg font-medium text-gray-400"><strong class="text-white">Description:</strong> ' . $row["description"] . '</p>
      <p class="text-lg font-medium text-gray-400"><strong class="text-white">Destination:</strong> ' . $row["destination"] . '</p>
      <p class="text-lg font-medium text-gray-400"><strong class="text-white">Prix:</strong> ' . $row["prix"] . ' DH</p>
      <p class="text-lg font-medium text-gray-400"><strong class="text-white">Date de Début:</strong> ' . $row["date_debut"] . '</p>
      <p class="text-lg font-medium text-gray-400"><strong class="text-white">Date de Fin:</strong> ' . $row["date_fin"] . '</p>
      <p class="text-lg font-medium text-gray-400"><strong class="text-white">Places Disponibles:</strong> ' . $row["places_desponsibles"] . '</p>
      </div>
      <div class="flex justify-end gap-2 mt-2 ">
      <button class="py-2 px-4 bg-green-700 hover:bg-green-500 text-white rounded-xl"><a href="client.php? reseveId='. $row['id_activite'] .'">Reserve</a></button>
      <button class="py-2 px-4 bg-red-700 hover:bg-red-500 text-white rounded-xl"><a href="deleteActivite.php? deleteId='. $row['id_activite'] . '">delet</a></button>
      </div>
      </div>';
    }
    echo '</div>';
  }
  ?>
</body>

</html>
