<?php echo doctype('html5') ?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>TicketService</title>
        
        <?php echo link_tag('assets/css/bootstrap.css'); ?>
        <?php echo link_tag('assets/css/custom.css'); ?>
    </head>
    
    <body>
      <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">TicketService</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
        
    <div class="container">
        <div class="page-header">
            <h1><?php echo $pageTitle ?></h1>
        </div>
          <?php echo $Menu ?>
        <br />
          <?php echo $htmlContent ?>

    </div><!-- /.container -->
 
    <script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.js'); ?>"></script>
>>>>>>> .r28
    </body>
</html>