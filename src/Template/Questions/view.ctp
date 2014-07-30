<div class="questions view">
	<h2><?php echo $question->title; ?></h2>
	<?php echo $this->element('item', ['type' => 'question', 'data' => $question]);?>
	
	<h3>Answers</h3>
	<?php
	if (!empty($question->answers)) {
		foreach($question->answers as $answer) {
			echo $this->element('item', ['type' => 'answer', 'data' => $answer]);
		}
	}
	?>
	
	<div class="your-answer">
		<h3>Your answer</h3>
		<?php
		echo $this->Form->create('Answers', ['url' => ['controller' => 'answers', 'action' => 'add', $question->id]]);
		echo $this->Form->input('Answers.answer', ['type' => 'textarea', 'label' => false]);
		echo $this->Form->submit('Post answer', ['class' => 'btn btn-success']);
		echo $this->Form->end();
		?>
	</div>
</div>