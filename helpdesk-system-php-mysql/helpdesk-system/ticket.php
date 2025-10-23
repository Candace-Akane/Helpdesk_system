<?php  
include 'init.php'; 
if(!$users->isLoggedIn()) {
    header("Location: login.php");    
}
$user = $users->getUserInfo();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Helpdesk System with PHP & MySQL</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>        
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/general.js"></script>
<script src="js/tickets.js"></script>
<link rel="stylesheet" href="css/style.css" />

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
.content-wrapper {
    max-width: 1200px;
    margin: 10px auto;
    background: #ffffff;
    padding: 20px 0;
    border-radius: 12px;
    transition: all 0.3s ease;
}
.panel-heading {
    background: none;
    border: none;
    margin-bottom: 10px;
}
#createTicket {
    font-size: 13px;
    padding: 6px 14px;
    border-radius: 6px;
    background: #28a745;
    border: none;
    color: white;
    font-weight: 500;
    transition: all 0.3s ease;
}
#createTicket:hover {
    background: #218838;
    box-shadow: 0 2px 6px rgba(0,0,0,0.2);
}
#listTickets {
    margin-top: 10px;
    border-radius: 8px;
    overflow: hidden;
    border: 1px solid #e0e0e0;
}
#listTickets th {
    background-color: #145A32;
    color: white;
    font-weight: 500;
    text-align: center;
    padding: 10px 8px;
}
#listTickets td {
    padding: 8px 10px;
    font-size: 13px;
    text-align: center;
    color: #555;
}
#listTickets tr:nth-child(even) {
    background-color: #f9f9f9;
}
#listTickets tr:hover {
    background-color: #e9f5ef;
    transition: all 0.3s ease;
}
#listTickets_wrapper .dataTables_filter input {
    border: 1px solid #ccc;
    border-radius: 6px;
    padding: 5px 8px;
    font-size: 13px;
    transition: all 0.3s ease;
}
#listTickets_wrapper .dataTables_filter input:focus {
    border-color: #28a745;
    box-shadow: 0 0 5px rgba(40, 167, 69, 0.3);
    outline: none;
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
                <button type="button" name="add" id="createTicket" class="btn btn-success btn-sm">Create Ticket</button>
            </div>
        </div>
    </div>

    <table id="listTickets" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>S/N</th>
                <th>Ticket ID</th>
                <th>Subject</th>
                <th>Department</th>
                <th>Created By</th>                    
                <th>Created</th>    
                <th>Status</th>
                <th></th>
                <th></th>
                <th></th>                    
            </tr>
        </thead>
    </table>
</div>

<?php include('add_ticket_model.php'); ?>
<?php include('inc/footer.php'); ?>
</body>
</html>
