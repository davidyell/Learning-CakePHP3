<div class='users login'>
	<?php
	echo $this->Form->create('Users');
	echo $this->Form->input('email');
	echo $this->Form->input('password');
	echo $this->Form->submit('Login');
	echo $this->Form->end();
	?>
</div>