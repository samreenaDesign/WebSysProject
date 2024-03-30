<nav class="navbar navbar-expand-lg bg-body-tertiary navbar-light bg-light" >
    <div class="container-fluid justify-content-center">
        <!-- Offcanvas menu button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">SHOP</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#lips">Lips</a></li>
                            <li><a class="dropdown-item" href="#face">Face</a></li>
                            <li><a class="dropdown-item" href="#hands">Hands</a></li>
                            <li><a class="dropdown-item" href="#eyes">Eyes</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sale.php">SALE</a>
                    </li>
                </ul>
            </div>
        </div>
        
        <a class="navbar-brand mx-auto" aria-current="page" href="index.php" style="display: block; text-align: center; width: 60%;">
            <span style="display: inline-block;">GLASKIN</span>
        </a>


        <!-- if there is time then do:
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        </form> -->
        <div class="offcanvas-footer d-flex justify-content-end">
        <!-- Register, Login, and Cart icons wrapped inside a ul -->
            <ul class="navbar-nav ml-auto d-flex flex-row gap-3 justify-content-center align-items-left">
                <?php if(!isset($_SESSION['member_id'])) { ?>
                <li class="nav-item">
                    <a class="nav-link icon" id="account-icon" href="login.php">
                        <img src="/images/account_icon.png" width="50" height="50" alt="Account" class="img-small">
                    </a>
                </li>
                <?php }
                else {

                 ?> 
                <li class="nav-item">
                    <form id="logout-form" action="logout.php" method="post">
                        <a class="nav-link icon" id="logout-icon" href="#" onclick="document.getElementById('logout-form').submit();">
                            <img src="/images/logout_icon.png" width="50" height="50" alt="Logout" class="img-small">
                        </a>
                    </form>
                </li>
                <?php  }  ?>
                <li class="nav-item position-static">
                    <div class="nav-link icon">
                        <!-- Cart icon with badge -->
                        <button type="button" class="position-relative" id="cart-icon" style="border: none; background-color: transparent;">
                            <img src="/images/shopping_bag_icon.png" width="50" height="50" alt="Cart" class="img-small">
                            <!-- Bootstrap 5 badge -->
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <!-- Cart item count or any other indicator -->
                                0
                            </span>
                        </button>
                        <!-- Dropdown menu for cart items -->
                        <div id="cart-dropdown" class="cart-dropdown dropdown position-absolute">
                            <div class="dropdown-menu dropdown-menu-right">
                                <div id="cart-items" class="cart-items">
                                    <!-- Cart items will be dynamically added here -->
                                </div>
                                <div class="d-flex justify-content-center"> <!-- Center the checkout button -->
                                    <button id="checkout-button" class="btn btn-primary">Checkout</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>