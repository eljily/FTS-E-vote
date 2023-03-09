<header>
  <!-- Navbar -->
<?php session_start();
if(isset($_GET["logout"])=="lout"){
    session_destroy();
    header("location:login.php");
}
if($_SESSION["email"]!="admin@gmail.com"){header("location:index.php");}
    ?>  
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
          <li class="nav-item active"><a href="admin_dashbord.php?logout=lout">
          <button class="btn btn-danger">
        LOG OUT</button></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ajout_candidat.php">AJOUTER UN CANDIDAT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ajout_etudiant.php">AJOUTER UN ETUDIANT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ajout_election.php">AJOUTER ELECTION</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="list_candi.php">LISTE DES CANDIDATS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="crud_etudiant.php">LISTE DES ETUDIANT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="crud_election.php">LISTE DES ELECTIONS</a>
          </li>
          <li class="nav-item">
          <form method="get" action="">
    <input class="form-control mr-sm-2" type="search" name="mc"
    placeholder="chercher" value="<?= @$mc ?>" aria-label="Search"></li>
          <li class="nav-item">
          <button type="submit" name="submit" class="btn btn-primary">
        CHERCHER</button>
  </form></li>
<li class="nav-item">
</li>
</nav>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Navbar -->


</header>