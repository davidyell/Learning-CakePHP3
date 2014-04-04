<div class="questions view">
	<h2><?php echo $question->title; ?></h2>
	<?php echo $this->element('item', ['type' => 'question', 'data' => $question]);?>
	
	<h3>Answers</h3>
	<?php
	foreach($question->answers as $answer) {
		echo $this->element('item', ['type' => 'answer', 'data' => $answer]);
	}
	?>
	
	<div class="your-answer">
		<h3>Your answer</h3>
		<?php
		echo $this->Form->create('Answers', ['url' => ['controller' => 'answers', 'action' => 'add', $question->id]]);
		echo $this->Form->input('answer', ['type' => 'textarea', 'label' => false]);
		echo $this->Form->submit('Post answer');
		echo $this->Form->end();
		?>
	</div>
</div>