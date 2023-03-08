<header>
  <!-- Navbar -->
  
  <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <div class="container-fluid">
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarExample01"
        aria-controls="navbarExample01"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarExample01">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item active"><a href="index.php?logout=lout">
          <button class="btn btn-danger">
        LOG OUT</button></a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="list_etud.php">LISTE DES ETUDIANTS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profile.php">MODIFIER PROFILE</a>
          
          <li class="nav-item">
          <li class="nav-item"><b>
<?php 
session_start();
if(isset($_SESSION["email"])){ echo $_SESSION["email"];} ?></b>
</li> 
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar -->
</header>