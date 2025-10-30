<?php 
include 'init.php'; 
if(!$users->isLoggedIn()) {
    header("Location: login.php");    
}
include('inc/header.php');
$user = $users->getUserInfo();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Helpdesk System - Users</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/general.js"></script>
<script src="js/user.js"></script>

<style>
.top-navbar {
    width: 100%;
    background: #0B3D2E;
    padding: 0 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
    position: sticky;
    top: 0;
    z-index: 1000;
}
.top-navbar .logo img {
    height: 80px;
    transition: transform 0.3s ease;
}
.top-navbar .logo img:hover {
    transform: scale(1.05);
}
.top-navbar .nav-right a,
.top-navbar .nav-right .dropdown-toggle {
    color: #ffffff;
    font-size: 15px;
    font-weight: 540;
    text-decoration: none;
    padding: 5px 8px;
    transition: all 0.3s ease;
    border-radius: 4px;
}
.top-navbar .nav-right a:hover,
.top-navbar .nav-right .dropdown-toggle:hover {
    color: #c8f7d6;
}

body {
    background-color: #ffffffff;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    color: #333;
}
.content-wrapper {
    max-width: 1200px;
    margin: 10px auto;
    background: #ffffff;
    padding: 20px 0;
    transition: all 0.3s ease;
}

#addUser {
    font-size: 13px;
    padding: 6px 14px;
    border-radius: 6px;
    background: #28a745;
    border: none;
    color: white;
    font-weight: 500;
    transition: all 0.3s ease;
}
#addUser:hover {
    background: #218838;
    box-shadow: 0 2px 6px rgba(0,0,0,0.2);
}

#listUser {
    margin-top: 10px;
    border-radius: 8px;
    overflow: hidden;
    border: 1px solid #e0e0e0;
    width: 100%;
}
#listUser th {
    background-color: #145A32;
    color: white;
    font-weight: 500;
    text-align: center;
    padding: 10px 8px;
}
#listUser td {
    padding: 8px 10px;
    font-size: 13px;
    text-align: center;
    color: #555;
}
#listUser tr:nth-child(even) {
    background-color: #f9f9f9;
}
#listUser tr:hover {
    background-color: #e9f5ef;
    transition: all 0.3s ease;
}

#listUser_wrapper .dataTables_filter input {
    border: 1px solid #ccc;
    border-radius: 6px;
    padding: 5px 8px;
    font-size: 13px;
    transition: all 0.3s ease;
}
#listUser_wrapper .dataTables_filter input:focus {
    border-color: #28a745;
    box-shadow: 0 0 5px rgba(40, 167, 69, 0.3);
    outline: none;
}

.modal-content {
    border-radius: 10px;
    border: none;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
}
.modal-header {
    background: #0B3D2E;
    color: #fff;
    border-radius: 10px 10px 0 0;
    padding: 15px 20px;
}
.modal-title {
    font-size: 18px;
    font-weight: 500;
}
.modal-body {
    padding: 20px 25px;
}
.modal-footer {
    border-top: 1px solid #e0e0e0;
    padding: 15px 20px;
}
.modal-footer .btn-info {
    background: #28a745;
    border: none;
    color: white;
    transition: all 0.3s ease;
}
.modal-footer .btn-info:hover {
    background: #218838;
}
.modal-footer .btn-default {
    background: #e0e0e0;
    color: #333;
}
.modal-footer .btn-default:hover {
    background: #c7c7c7;
}
</style>
</head>
<body>

<div class="top-navbar">
    <div class="logo">
        <img src="Helpdesk Pic/bgh_logo-removebg-preview.png" alt="Logo">
    </div>
    <div class="nav-right">
        <?php include('menus.php'); ?>
    </div>
</div>

<div class="content-wrapper">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2 text-right">
                <button type="button" name="add" id="addUser" class="btn btn-success btn-sm">Add New</button>
            </div>
        </div>
    </div>

    <table id="listUser" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>S/N</th>
                <th>Name</th>					
                <th>Email</th>
                <th>Created</th>
                <th>Role</th>
                <th>Status</th>
                <th></th>
                <th></th>				
            </tr>
        </thead>
    </table>

    <div id="userModal" class="modal fade">
        <div class="modal-dialog">
            <form method="post" id="userForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-plus"></i> Add User</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username" class="control-label">Name*</label>
                            <input type="text" class="form-control" id="userName" name="userName" placeholder="User name" required>			
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label">Email*</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>			
                        </div>
                        <div class="form-group">
                            <label for="role" class="control-label">Role</label>				
                            <select id="role" name="role" class="form-control">
                                <option value="admin">Admin</option>				
                                <option value="user">Member</option>	
                            </select>						
                        </div>	
                        <div class="form-group">
                            <label for="status" class="control-label">Status</label>				
                            <select id="status" name="status" class="form-control">
                                <option value="1">Active</option>				
                                <option value="0">Inactive</option>	
                            </select>						
                        </div>
                        <div class="form-group">
                            <label for="newPassword" class="control-label">New Password</label>
                            <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Password">			
                        </div>											
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="userId" id="userId" />
                        <input type="hidden" name="action" id="action" value="" />
                        <input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('inc/footer.php'); ?>
</body>
</html>
