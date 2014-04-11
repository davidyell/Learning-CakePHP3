<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <?php echo $this->Html->charset();?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->fetch('title');?></title>

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

		<?php
		echo $this->fetch('meta');
		
		echo $this->Html->css([
			'//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css', 
			'//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css',
			'//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css',
			'style'
		]);
		echo $this->fetch('css');
		
		echo $this->Html->script('vendor/modernizr-2.6.2.min');
		?>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

		<div class="container">
			<header class="row">
				<div class="col-md-4">
					<h1>Cake Exchange</h1>
				</div>
				<div class='col-md-8'>
					<?php echo $this->element('navigation');?>
				</div>
			</header>
			
			<div class="row">
				<div class="col-md-12">
					<?php
					echo $this->Session->flash();
					echo $this->fetch('content');
					?>
				</div>
			</div>
			
			<footer class="row">
				<div class="col-md-12">
					<p>Example site created to learn CakePHP 3.</p>
					<p><?php echo $this->Html->link('@yelldavid', 'http://twitter.com/yelldavid');?></p>
				</div>
			</footer>
		</div>
		
		<div id="loading" class="dialog" style="display:none">
			<p><span class="glyphicon glyphicon-cloud-download"></span></p>
			<p>Loading</p>
		</div>
		
		<div id="login" class="dialog" style="display:none">
			<span class="glyphicon glyphicon-remove"></span>
			<p><span class="glyphicon glyphicon-ban-circle"></span></p>
			<p>You must be logged in</p>
			<p><?php echo $this->Html->link('Login', ['controller' => 'users', 'action' => 'login'], ['class' => 'btn btn-success']);?></p>
		</div>
		
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
		
		<?php
		echo $this->Html->script(['plugins', 'common']);
		echo $this->fetch('script');
		?>
    </body>
</html>
