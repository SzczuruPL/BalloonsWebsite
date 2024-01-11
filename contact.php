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
              <a  class="nav-link fw-bold" href="index.html">TNG</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" href="news.php">Aktualności</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" href="fleet.html">Flota</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" href="pricing.html">Cennik</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold active" aria-current="page" href="#">Kontakt</a>
            </li>
          </ul>
          <span class="navbar-text" id="clock">
            <script src="js/holytime.js"></script>
          </span>
        </div>
      </div>
    </nav>

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
      </symbol>
      <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
      </symbol>
    </svg>

    <main role="main" class="inner cover text-white text-center p-3">
      <div style="min-width: 50%; max-width: 80%; margin-left: auto; margin-right: auto;">
        <h1 class="display-5">Skontaktuj się z nami</h1>
        <form action="contact.php" method="POST">
          <?php
            include 'php/database.php';
            if(isset($_POST['email']) && isset($_POST['imie']) && isset($_POST['tresc']))
            {
                $email = test_input($_POST['email']);
                $imie = test_input($_POST['imie']);
                $tresc = test_input($_POST['tresc']);
        
                $temp = "INSERT INTO contact (email,imie,tresc) VALUES ('$email','$imie','$tresc');";
                if(mysqli_query($conn, $temp))
                {
                  echo "<div class='alert alert-success alert-dismissible d-flex align-items-center' role='alert'>";
                  echo "  <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>";
                  echo "  <div>";
                  echo "    Twoje zgłoszenie zostało wysłane!";
                  echo "  </div>";
                  echo " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                  echo "</div>";
                }
                else
                {
                  echo "<div class='alert alert-danger alert-dismissible d-flex align-items-center' role='alert'>";
                  echo "  <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#check-circle-fill'/></svg>";
                  echo "  <div>";
                  echo "    Wysłanie zgłoszenia nie powiodło się!";
                  echo "  </div>";
                  echo " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                  echo "</div>";
                }
            }
            
            function test_input($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
            }
          ?>
          <div class="form-group" style="padding-top: 25px;">
            <label for="email">Adres e-mail</label>
            <input type="email" class="form-control bg-dark text-white" id="email" name="email" placeholder="adres@example.com" required>
          </div>
            <div class="form-group" style="padding-top: 10px;">
                <label for="imie">Imię i nazwisko</label>
                <input type="text" class="form-control bg-dark text-white" id="imie" name="imie" placeholder="Jan Kowalski" required>
              </div>
            <div class="form-group" style="padding-top: 10px; padding-bottom: 25px;">
              <label for="tresc">Treść zapytania</label>
              <textarea class="form-control bg-dark text-white" id="tresc" name="tresc" rows="3" placeholder="Treść zapytania" required></textarea>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-outline-light">Wyślij</button>
            </div>
        </form>
      </div>

      <div class="album py-5">
        <h2 class="display-6" style="padding-bottom: 10px;">Kontakt bezpośredni</h2>
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <div class="card bg-dark text-white border-white" style="margin-top: 5px;">
                <div class="card-body">
                  <h5 class="card-title">Wojciech Noga</h5>
                  <h6 class="card-subtitle mb-2 text-white-50">Pilot, manager lotów</h6>
                  <p class="card-text">wojciech.noga@tng.pl<br>+48 501 000 000</p>
                  <a href="http://www.facebook.com" class="btn btn-outline-light">Facebook</a>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card bg-dark text-white border-white" style="margin-top: 5px;">
                <div class="card-body">
                  <h5 class="card-title">TNG Ballon Travel Sp zoo</h5>
                  <p class="card-text">Ul. Zmyślona 21/37<br>69-420 Zadupie Małopolskie</p>
                  <p class="card-text">+48 12 420 21 37<br>balloon@tng.pl</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <footer class="mt-auto">
      <div class="bg-dark text-center p-3 text-white-50">
        © 2022 - Jakub Michał Biłyk for TNG Balloon Travel
      </div>
    </footer>
  </body>
</html>