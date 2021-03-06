<?php $page = isset($_GET['page']) ? $_GET['page'] : 'home'; ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <meta name="description" content="<?= $desc ?>">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css"> 
    <link rel="stylesheet" href="css/swipebox.css">   
  </head>
<body> 
    <div class="wrapper">
        <div id="content">
           <?= $this->insert('nav') ?>  
           <?= $this->section('content') ?> 
        </div>
        <div class="push"></div>
    </div>
    <?= $this->insert('footer') ?>
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/animation.js"></script>
<script src="js/jquery.swipebox.js"></script> 
<?php if($page == 'gallery'): ?>
<script type="text/javascript">
    ;( function($) {
        $('.swipebox').swipebox();
    } )( jQuery );
</script> 
<?php endif; ?>
<script type="text/javascript" src="js/regularExpressions.js"></script>
<script type="text/javascript" src="js/validation.js"></script> 
<script type="text/javascript" src="js/loginLiveValidation.js"></script>  
<script type="text/javascript" src="js/manageUsersValidation.js"></script>
<script type="text/javascript" src="js/registerLiveValidation.js"></script>
</body>
</html>