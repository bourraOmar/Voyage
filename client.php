<!DOCTYPE html>
<html>

<head>
  <title>travel Vibe</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>


  <!-- body -->
  <section class="relative w-[100%] min-h-screen flex justify-center items-start">

    <header class="absolute top-0 left-0 w-[100%] z-10">
      <nav class="border-gray-200 px-4 lg:px-6 py-2.5 bg-black">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
          <a href="#" class="flex items-center">
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Travel Vibe</span>
          </a>
          <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1">
            <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
              <li>
                <a href="index.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Home</a>
              </li>
              <li>
                <a href="activite.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Activite</a>
              </li>
              <li>
                <a href="client.php" class="block py-2 pr-4 pl-3 text-white rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 dark:text-white">Client</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>


    <video src="nightlife.mp4" autoplay muted loop class="absolute left-0 top-0 w-[100%] h-[100%] object-cover blur-[2px]"></video>

    <div class="flex flex-col mt-20">
      <div class="flex justify-end mx-6 my-4 z-10">
        <button class="py-2 px-2 bg-gray-800 text-white rounded-xl"
          onclick="document.getElementById('addActivitiesform').classList.remove('hidden');document.getElementById('addActivitiesform').classList.add('flex')"><b>+</b> Ajouter Client</button>
      </div>

      <!-- add client -->
      <div id="addActivitiesform" class="hidden justify-center items-center fixed inset-0 bg-black bg-opacity-30 z-20">
        <form method="POST" action=""
          class="flex flex-col justify-center items-center pt-5 w-[500px] bg-white rounded-md py-8">
          <div>
            <label>Name:</label>
            <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="text"
              name="name" required>
          </div>
          <div>
            <label>Prenom :</label>
            <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="text"
              name="prenom" required>
          </div>
          <div>
            <label>Email :</label>
            <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="text"
              name="email" required>
          </div>
          <div>
            <label>Telephone :</label>
            <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="text"
              name="telephone" required>
          </div>
          <div>
            <label>Address :</label>
            <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="text"
              name="address" required>
          </div>
          <div>
            <label>Date de naissance :</label>
            <input style="width: 400px;" class="rounded-xl text-black text-sm  block p-2.5 dark:bg-gray-200" type="date"
              name="dateNaissance" required>
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
        $name = $_POST["name"];
        $prenom = $_POST["prenom"];
        $email = $_POST["email"];
        $telephone = $_POST["telephone"];
        $address = $_POST["address"];
        $dateNaissance = $_POST["dateNaissance"];

        $sql  = "INSERT INTO client (nom ,prenom, email, telephone, address, data_naissance) VALUES (?,?,?,?,?,?)";

        $sqlrepare = mysqli_prepare($conn, $sql);
        $sqlsend = mysqli_stmt_bind_param($sqlrepare, "ssssss", $name, $prenom, $email, $telephone, $address, $dateNaissance);


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

      if (isset($_GET['reseveId'])) {
        $id = $_GET['reseveId'];
      }

      $selectAll = "SELECT * FROM `client`";
      $data = mysqli_query($conn, $selectAll);

      if ($data) {
        echo '
      <div class="overflow-x-auto shadow-md mx-2 sm:rounded-lg z-10">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-6 py-3">Name</th>
              <th scope="col" class="px-6 py-3">Prenom</th>
              <th scope="col" class="px-6 py-3">E-mail</th>
              <th scope="col" class="px-6 py-3">Telephone</th>
              <th scope="col" class="px-6 py-3">Address</th>
              <th scope="col" class="px-6 py-3">Date de naissance</th>
              <th scope="col" class="px-6 py-3">Action</th>
            </tr>
          </thead>
      </div>
    ';
        while ($row = $data->fetch_assoc()) {
          echo '<tbody>
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">' . $row["nom"] . '</th>
            <td class="px-6 py-4">' . $row["prenom"] . '</td>
            <td class="px-6 py-4">' . $row["email"] . '</td>
            <td class="px-6 py-4">' . $row["telephone"] . '</td>
            <td class="px-6 py-4">' . $row["address"] . '</td>
            <td class="px-6 py-4">' . $row["data_naissance"] . '</td>
            <td class="px-6 py-4"><a href="deleteClient.php? clientId=' . $row["id_client"] . '"class="font-medium text-blue-600 dark:text-red-500 hover:underline">Delete</a>
        </tr>
      </tbody>';
        }
        echo '</table>
    </div>
    </section>';
      }
      ?>
      <footer class="absolute bottom-0 left-0 w-[100%] shadow  bg-black">
        <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
          <span class="text-sm text-gray-500 sm:text-center dark:text-white">© 2023 <a href="#" class="hover:underline">Travel Vibe</a>. All Rights Reserved.
          </span>
          <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-white sm:mt-0">
            <li>
              <a href="#" class="hover:underline me-4 md:me-6">About</a>
            </li>
            <li>
              <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
            </li>
            <li>
              <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
            </li>
            <li>
              <a href="#" class="hover:underline">Contact</a>
            </li>
          </ul>
        </div>
      </footer>
</body>

</html>