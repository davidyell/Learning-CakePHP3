<div class='comments add'>
	<?php
	echo $this->Form->create();
	echo $this->Form->input('comment', ['type' => 'textarea']);
	echo $this->Form->submit('Post comment', ['class' => 'btn btn-success']);
	echo $this->Form->end();
	?>
</div>