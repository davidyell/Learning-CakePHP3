<div class="questions add">
	<?php
	echo $this->Form->create();
	echo $this->Form->input('title');
	echo $this->Form->input('question', ['type' => 'textarea']);
	echo $this->Form->submit('Post question', ['class' => 'btn btn-success']);
	echo $this->Form->end();
	?>
</div>