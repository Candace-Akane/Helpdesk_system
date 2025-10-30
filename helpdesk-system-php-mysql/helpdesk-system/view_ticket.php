<?php 
include 'init.php'; 
if (!$users->isLoggedIn()) {
    header("Location: authenticate.php");	
}
include('inc/header.php');

$ticketDetails = $tickets->ticketInfo($_GET['id']);
$ticketReplies = $tickets->getTicketReplies($ticketDetails['id']);
$user = $users->getUserInfo();
$tickets->updateTicketReadStatus($ticketDetails['id']);
?>	

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>View Ticket - Helpdesk System</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
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
    max-width: 1000px;
    margin: 20px auto;
    background: #ffffff;
    padding: 10px;
    border-radius: 12px;
    transition: all 0.3s ease;
}
.panel {
    border-radius: 10px;
    border: 1px solid #e0e0e0;
    margin-bottom: 20px;
}
.panel-heading {
    background-color: #145A32;
    color: #fff;
    border-radius: 10px 10px 0 0;
    padding: 10px 15px;
    font-weight: 500;
}
.ticket-title {
    font-weight: bold;
    font-size: 15px;
    margin-left: 8px;
}
.panel-body {
    padding: 15px;
    background-color: #f9f9f9;
    color: #333;
}
.comment-list {
    margin-top: 20px;
}
.comment-post p {
    font-size: 14px;
    line-height: 1.6;
}
textarea.form-control {
    border-radius: 8px;
    resize: none;
    font-size: 14px;
}
textarea.form-control:focus {
    border-color: #28a745;
    box-shadow: 0 0 5px rgba(40, 167, 69, 0.3);
}
.btn-success {
    background-color: #28a745;
    border: none;
    border-radius: 6px;
    font-weight: 500;
}
.btn-success:hover {
    background-color: #218838;
}
.comment-date-main {
    font-size: 12px;
    color: #333;
}
.comment-date-reply {
    font-size: 12px;
    color: #fff;
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
    <section class="comment-list">          
        <article class="row">            
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <?php if ($ticketDetails['resolved']) { ?>
                            <button type="button" class="btn btn-danger btn-sm">
                                <span class="glyphicon glyphicon-eye-close"></span> Closed
                            </button>
                        <?php } else { ?>
                            <button type="button" class="btn btn-success btn-sm">
                                <span class="glyphicon glyphicon-eye-open"></span> Open
                            </button>
                        <?php } ?>
                        <span class="ticket-title"><?php echo $ticketDetails['title']; ?></span>
                    </div>
                    <div class="panel-body">
                        <div class="comment-post">
                            <p><?php echo nl2br($ticketDetails['message']); ?></p>
                        </div>                 
                    </div>
                    <div class="panel-footer" style="background:#f1f1f1; border-radius:0 0 10px 10px; padding:10px 15px;">
                        <span class="glyphicon glyphicon-time"></span> 
                        <time class="comment-date-main"><?php echo $time->ago($ticketDetails['date']); ?></time>
                        &nbsp;&nbsp;<span class="glyphicon glyphicon-user"></span> <?php echo $ticketDetails['creater']; ?>
                        &nbsp;&nbsp;<span class="glyphicon glyphicon-briefcase"></span> <?php echo $ticketDetails['department']; ?>
                    </div>
                </div>			 
            </div>
        </article>		

        <?php foreach ($ticketReplies as $replies) { ?>		
            <article class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading" style="background-color: #145A32;">
                            <span class="glyphicon glyphicon-user"></span>
                            <?php echo ($replies['user_type'] == 'admin') ? $ticketDetails['department'] : $replies['creater']; ?>
                            &nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span> 
                            <time class="comment-date-reply"><?php echo $time->ago($replies['date']); ?></time>
                        </div>
                        <div class="panel-body">
                            <div class="comment-post">
                                <p><?php echo nl2br($replies['message']); ?></p>
                            </div>                  
                        </div>
                    </div>
                </div>            
            </article> 		
        <?php } ?>

        <form method="post" id="ticketReply">
            <article class="row">
                <div class="col-md-12">				
                    <div class="form-group">							
                        <textarea class="form-control" rows="5" id="message" name="message" placeholder="Enter your reply..." required></textarea>	
                    </div>				
                </div>
            </article>  

            <article class="row">
                <div class="col-md-12">
                    <div class="form-group text-right">							
                        <input type="submit" name="reply" id="reply" class="btn btn-success" value="Reply" />		
                    </div>
                </div>
            </article> 

            <input type="hidden" name="ticketId" id="ticketId" value="<?php echo $ticketDetails['id']; ?>" />	
            <input type="hidden" name="action" id="action" value="saveTicketReplies" />			
        </form>
    </section>	
</div>

<?php include('add_ticket_model.php'); ?>
<?php include('inc/footer.php'); ?>
</body>
</html>
