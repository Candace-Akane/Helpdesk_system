<?php 
include 'init.php';
if ($users->isLoggedIn()) {
    header('Location: ticket.php');
}
$errorMessage = $users->login();
include('inc/header.php');
?>
<title>Helpdesk System with PHP & MySQL</title>
<?php include('inc/container.php'); ?>

<style>
body {
    margin: 0;
    padding: 0;
    height: 100vh;
    background: linear-gradient(to right, #0B3D2E, #145A32);
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: 'Segoe UI', Arial, sans-serif;
    box-sizing: border-box;
}

.login-wrapper {
    width: 950px;
    height: 500px;
    background: #ffffff;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 8px 28px rgba(0, 0, 0, 0.25);
    display: flex;
    margin: 0 auto;
}

.left-panel {
    flex: 1;
    background: linear-gradient(to bottom right, #0d5c2b, #0b4720);
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px;
}

.login-box {
    background: #ffffff;
    padding: 35px;
    width: 100%;
    max-width: 350px;
    border-radius: 10px;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
}

.login-box h3 {
    text-align: center;
    margin-bottom: 28px;
    color: #0d5c2b;
    font-weight: 700;
    font-size: 22px;
}

.form-control {
    height: 45px;
    border-radius: 6px;
    font-size: 15px;
    border: 1px solid #dcdcdc;
    transition: 0.3s ease;
}

.form-control:focus {
    border-color: #0d5c2b;
    box-shadow: 0 0 6px rgba(13, 92, 43, 0.4);
}

.input-group-addon {
    background: #f1f1f1;
    border-radius: 6px 0 0 6px;
    border: 1px solid #dcdcdc;
    padding: 10px;
}

.input-group-addon img {
    width: 18px;
    height: 18px;
}

.btn-custom {
    background: linear-gradient(to right, #0d5c2b, #0a381b);
    color: white;
    width: 100%;
    font-size: 16px;
    font-weight: bold;
    border-radius: 6px;
    padding: 12px;
    transition: 0.3s ease;
    border: none;
}

.btn-custom:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.right-panel {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #ffffff;
    padding: 30px;
}

.right-panel img {
    max-width: 100%;
    height: auto;
    transition: 0.3s;
}

.right-panel img:hover {
    transform: scale(1.05);
}

@media (max-width: 768px) {
    .login-wrapper {
        flex-direction: column;
        width: 90%;
        height: auto;
    }
    .left-panel,
    .right-panel {
        width: 100%;
        height: 350px;
    }
}
</style>

<div class="login-wrapper">
    <div class="left-panel">
        <div class="login-box">
            <h3>LOGIN</h3>
            <form id="loginform" class="form-horizontal" method="POST" action="">
                <?php if ($errorMessage != '') { ?>
                    <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
                <?php } ?>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <img src="Helpdesk Pic/user-solid.svg" alt="User">
                        </span>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email..." required>
                    </div>
                </div>

                <div class="form-group" style="margin-top: 20px;">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <img src="Helpdesk Pic/lock-solid.svg" alt="Password">
                        </span>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password..." required>
                    </div>
                </div>

                <div class="form-group" style="margin-top: 30px;">
                    <input type="submit" name="login" value="LOGIN" class="btn btn-custom">
                </div>
            </form>
        </div>
    </div>

    <div class="right-panel">
        <img src="Helpdesk Pic/bgh_logo-removebg-preview.png" alt="BGH Logo">
    </div>
</div>

<?php include('inc/footer.php'); ?>
