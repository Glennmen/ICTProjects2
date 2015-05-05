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
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
          <a class="navbar-brand">TicketService</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
              <?php echo $Menu ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
        
    <div class="container">
        <div class="page-header">
            <h1><?php echo $pageTitle ?></h1>
        </div>
          <?php echo $htmlContent ?>

    </div><!-- /.container -->
 
    <script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-hover-dropdown.min.js'); ?>"></script>
    </body>
</html>