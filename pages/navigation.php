<nav
class="navbar nav-underline sticky-lg-top navbar-expand-xxl bg-body-tertiary">
<div class="container-fluid">
  <a
    class="navbar-brand d-flex align-items-center text-success"
    id="brand"
    href="#"
    ><img src="../assets/logo-nobg.png" class="img-fluid logo-pic" />
    <p class="title">Agrikultur'App</p></a
  >
  <button
    class="navbar-toggler"
    type="button"
    data-bs-toggle="collapse"
    data-bs-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent"
    aria-expanded="false"
    aria-label="Toggle navigation"
  >
    <span class="navbar-toggler-icon fs-1"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul
      class="navbar-nav ms-auto mb-2 mb-lg-0 text-end d-flex align-items-xxl-center"
    >
      <li class="nav-item me-2">
        <a
          class="nav-link active text-success"
          id="nav-link"
          aria-current="page"
          href="AuctionPage.html"
          ><i class="fa-solid fa-gavel"></i> Auction Page</a
        >
      </li>
      <li class="nav-item d-block d-xxl-none">
        <a
          class="nav-link text-success"
          href="Notifications.html"
          id="nav-link"
          ><i class="fa-solid fa-bell"></i> Notifications</a
        >
      </li>
      <li class="nav-item me-2">
        <a
          class="nav-link text-success"
          href="Guidelines.html"
          id="nav-link"
          ><i class="fa-solid fa-table"></i> Pricing Guidelines</a
        >
      </li>
      <li class="nav-item">
        <p class="desc text-end d-block d-xxl-none">
          Logged In as:
          <strong
            ><a
              href="Profile.html"
              class="nav-link text-success text-decoration-underline"
              ><?php echo "{$_SESSION["first_name"]} {$_SESSION["last_name"]}" ?></a
            ></strong
          >
        </p>
      </li>

      <li class="nav-item me-2">
        <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
          <button
            type="submit"
            class="btn btn-success w-auto fs-3 d-block d-xxl-none float-end"
            name="signout"
            >Sign Out</button
          >
        </form>
      </li>
    </ul>
    <div class="nav-pic d-none d-xxl-block btn-group dropdown">
      <button
        type="button"
        class="btn dropdown-toggle"
        id="dropdownMenuButton"
        data-bs-toggle="dropdown"
        aria-haspopup="true"
        aria-expanded="false"
      >
        <img src="../assets/Teddy.jpg" class="img-fluid rounded-circle" />
      </button>
      <div
        class="dropdown-menu fs-3"
        id="dropdown-menu"
        aria-labelledby="dropdownMenuButton"
      >
        <a class="dropdown-item text-success" href="Profile.html"
          ><i class="fa-solid fa-user"></i> Profile</a
        >
        <a class="dropdown-item text-success" href="Notifications.html"
          ><i class="fa-solid fa-bell"></i> Notifications</a
        >
        <div class="dropdown-divider"></div>
        <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
        <button class="btn btn-success w-100 fs-3" name="signout" type="submit"
          ><i class="fa-solid fa-right-from-bracket"></i> Sign Out</button
        >
        </form>
        
      </div>
    </div>
  </div>
</div>
</nav>