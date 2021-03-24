<header class="navbar navbar-light sticky-top bg-primary navbar-expand-lg shadow p-0">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 text-light font-weight-bold" href="<?php echo Dominio;?>"><?php echo NombreApp;?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item navbar-hover">
          <a class="nav-link text-light " href="home">Home</a>
        </li>
        <li class="nav-item navbar-hover">
          <a class="nav-link text-light" href="about">Nosotros</a>
        </li>
        <?php
          if (isset($_SESSION['username'])) {
            echo "
              <li class='nav-item text-nowrap dropdown'>
                <a class='nav-link dropdown-toggle text-light' href='#' id='navbarDropdownMenuLink' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                ".$_SESSION['username']."</a>
                <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                  <a class='dropdown-item' href='logout'>Logout</a>
                </div>
              </li>
            </ul>
            ";
          }else{
            echo "
                <a class='navbar-brand me-0 px-3 text-light' href='login'>Login</a></ul>
            ";
          }
        ?>
    </div>
</header>