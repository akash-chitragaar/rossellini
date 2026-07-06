<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/"">
            <img src="assets/images/logo.png" alt="<?php echo $restaurant['name']; ?>" class="navbar-logo" width="40" height="40" loading="eager">
            <?php echo $restaurant['name']; ?>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#menu">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#location">Location</a>
                </li>
                <li class="nav-item">
                </li>
                <li class="nav-item">
                    <a class="btn btn-order ms-lg-3 mt-2 mt-lg-0" href="<?php echo $restaurant['orderLink']; ?>" target="_blank" rel="noopener">
                        Order Online
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

