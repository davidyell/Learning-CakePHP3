<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <?php echo $this->Html->charset();?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->fetch('title');?></title>

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

		<?php
		echo $this->fetch('meta');
		
		echo $this->Html->css(['normalize', 'style']);
		echo $this->fetch('css');
		
		echo $this->Html->script('vendor/modernizr-2.6.2.min');
		?>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

		<?php echo $this->fetch('content');?>
		
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
		
		<?php
		echo $this->Html->script(['plugins', 'common']);
		echo $this->fetch('script');
		?>
    </body>
</html>
