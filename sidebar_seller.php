<?php

include('connexion.php');

session_start();
if(isset($_SESSION['email'])){
    $_SESSION['email'];
}

?>
<div class="sidebar">
        <header class="title-sidebar">
                <i class="fa-solid fa-bars"></i>
                Dashbord
            </header>
            <ul>
                <li>
                    <a href="selersdashboard.php?email=<?php  echo $_SESSION['email']; ?>">
                    Accueil
                    </a>
                </li>
                <li><a href="myproducts.php?email=<?php  echo $_SESSION['email']; ?>">
                    my products
                </a></li>
                <li><a href="createProduct.php?email=<?php  echo $_SESSION['email']; ?>">
                    create product
                </a></li>


            </ul>
            
            <ul class="logout-mode">
                <li><a href="logout.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
</div>