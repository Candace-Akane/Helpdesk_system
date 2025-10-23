<nav class="navbar custom-navbar">
    <div class="container-fluid nav-container">
        <ul class="nav navbar-nav left-nav">
            <li id="ticket">
                <a href="ticket.php" class="nav-link">Ticket</a>
            </li>
            <?php if(isset($_SESSION["admin"])) { ?>
                <li id="user">
                    <a href="user.php" class="nav-link">Users</a>
                </li>
            <?php } ?>
        </ul>

        <ul class="nav navbar-nav right-nav">
            <li class="dropdown user-dropdown">
                <a href="#" class="dropdown-toggle user-info" data-toggle="dropdown">
                    <img src="//gravatar.com/avatar/<?php echo md5($user['email']); ?>?s=100" 
                         alt="User Avatar" class="user-avatar">
                    <span class="username">
                        <?php if(isset($_SESSION["userid"])) { echo htmlspecialchars($user['name']); } ?>
                    </span>
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu animated-dropdown">
                    <li><a href="logout.php" class="dropdown-item">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<style>
.custom-navbar {
    background: #0B3D2E;
    border: none;
    border-radius: 0;
    padding: 12px 40px;
    margin: 0;
    position: sticky;
    top: 0;
    z-index: 1050;
}

.left-nav,
.right-nav {
    display: flex;
    align-items: center;
    gap: 25px;
    margin: 0;
    padding: 0;
}

.nav-link {
    position: relative;
    color: #ffffff !important;
    font-size: 15px;
    font-weight: 500;
    text-transform: capitalize;
    padding: 8px 16px !important;
    border-radius: 0;
    transition: all 0.3s ease-in-out;
    background: none !important;
}

.nav-link::after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0%;
    height: 2px;
    background-color: #4CAF50;
    transition: width 0.3s ease-in-out;
}

.nav-link:hover::after {
    width: 100%;
}

.navbar-nav > li.active > a,
.navbar-nav > li.open > a,
.navbar-nav > li > a:focus,
.navbar-nav > li > a:active {
    background: none !important;
    color: #4CAF50 !important;
    box-shadow: none !important;
}

.user-dropdown {
    position: relative;
}

.user-info {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #ffffff !important;
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
    transition: color 0.3s ease-in-out;
    background: none !important;
}

.user-info:hover,
.user-info:focus {
    color: #4CAF50 !important;
    background: none !important;
    text-decoration: none !important;
}

.user-avatar {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    border: 2px solid #ffffff;
    transition: transform 0.3s ease-in-out;
}

.user-info:hover .user-avatar {
    transform: scale(1.1);
}

.animated-dropdown {
    border-radius: 6px;
    margin-top: 8px;
    min-width: 130px;
    background-color: #ffffff;
    opacity: 0;
    transform: translateY(-10px);
    transition: all 0.3s ease-in-out;
    display: none;
    box-shadow: none;
    border: none;
}

.user-dropdown.open .animated-dropdown {
    opacity: 1;
    transform: translateY(0);
    display: block;
}

.dropdown-item {
    color: #000 !important;
    font-size: 13px;
    padding: 8px 16px;
    transition: color 0.3s ease;
    background: none !important;
}

.dropdown-item:hover {
    background: #e8f5e9 !important;
    color: #000 !important;
}

@media (max-width: 768px) {
    .nav-container {
        flex-direction: column;
        align-items: flex-start;
    }
    .left-nav,
    .right-nav {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
    }
}
</style>
