<?php 

session_start();
if(!$_SESSION['start_session']) {
   //header('Location: '.site_url('login'));
   exit('<meta http-equiv="refresh" content="0; url='.site_url().'/login'.'">');
   wp_redirect(site_url('login'));
}

wp_redirect(site_url().'/login');

$message='';
if(@$_POST) {
    if( $_POST['pass'] == 'Steady!' && $_POST['user'] == 'Athens Capital' ) {
    	$_SESSION['start_session']  = 'started';
    }
    else {
    	$message="Username doesn't exists";
    }
}

if(@$_SESSION['start_session']) {
    header('Location: '.site_url());
    exit;
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    #login {
    	max-width: 300px;
        margin: auto;
    }
    .btn-primary {
    color: #326280;
    background-color: #D8F0FF;
    text-align: center;
    padding: 10px 15px;
    font-size: 14px;
    border: 0;
    position: relative;
}
    </style>
</head>
<body >
<main id="main" role="main">
      <div id="logo" style="text-align: center"><img id="wpm-image" src="https://athenscapital.com/wp-content/uploads/2023/05/MicrosoftTeams-image_32.png" width="600px" height="190px" alt="Athens Alternative Investments for Growing &amp; Preserving Wealth" title="Athens Alternative Investments for Growing &amp; Preserving Wealth" style="width:100%;max-width:600px!important;height:auto;"></div>
      <p></p>
      <div id="sscontent">
        <form id="login" action="" method="post">
        <?php echo $message ? '<div class="alert alert-danger" role="alert">'.$message.'</div>' :''?>
        
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" class="form-control" name="user" required >
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" required name="pass">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Remember me</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

      </div>
      <p></p>  
    </main>
    
</body>
</html>