<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TNG Balloon</title>
    <link rel="icon" type="image/png" href="img/flvic.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body class="d-flex flex-column min-vh-100 bg-dark">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="img/tng.png" alt="" width="120" height="40" class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link fw-bold" href="index.html">TNG</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold active" aria-current="page" href="#">Aktualności</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" href="fleet.html">Flota</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" href="pricing.html">Cennik</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" href="contact.php">Kontakt</a>
            </li>
          </ul>
          <span class="navbar-text" id="clock">
            <script src="js/holytime.js"></script>
          </span>
        </div>
      </div>
    </nav>

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
      </symbol>
    </svg>

    <main role="main" class="inner cover text-white text-center p-3">
        <h1 class="display-5">Aktualności</h1>
        <p class="lead">W tej sekcji przedstawiamy między innymi wydarzenia w których braliśmy udział.</p>
    </main>
    <?php
        include 'php/database.php';
        $sql = "SELECT id, tytul, obraz, tresc, czas FROM news";
        $result = $conn->query($sql);

        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
              echo "<div class='card mb-3 bg-dark text-white border-white' style='max-width: 80%; margin-left: auto; margin-right: auto;'>";
              echo " <div class='row g-0'>";
              echo "   <div class='col-md-4'>";
              echo "  	<img class='img fluid rounded-start w-100' src='news/".$row["obraz"]."' style='min-height: 100%;' alt='Card image cap'>";
              echo "   </div>";
	      echo " <div class='col-md-8'>";
              echo "  <div class='card-body'>";
              echo "    <h5 class=card-title>".$row["tytul"]."</h5>";
              echo "    <p class='card-text'>".$row["tresc"]."</p>";
              echo "    <p class='card-text'><small class='text-muted text-white-50'>Data zamieszczenia: ".$row["czas"]."</small></p>";
              echo "    </div>";
              echo "  </div>";
              echo "  </div>";
              echo "</div>";
            }
        }
        else
        {
            echo "<div class='alert alert-danger d-flex align-items-center' role='alert' style='max-width: 80%; margin-left: auto; margin-right: auto;'>";
            echo "  <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>";
            echo "  <div>";
            echo "    Brak artykułów w bazie danych!";
            echo "  </div>";
            echo "</div>";
        }
    ?>

    <footer class="mt-auto">
        <div class="bg-dark text-center p-3 text-white-50">
            © 2022 - Jakub Michał Biłyk for TNG Balloon Travel
        </div>
      </footer>
    </body>
  </html>