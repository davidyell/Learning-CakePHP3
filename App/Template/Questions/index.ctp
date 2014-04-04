<div class="questions index">
	<h2>Latest questions</h2>
	
	<?php foreach ($questions as $question):?>
		<div class="question">
			<div class="question-stats">
				<div class="votes"><span class="count"><?php echo $question->upvotes - $question->downvotes;?></span> votes</div>
				<div class="answers"><span class="count"><?php echo $question->answer_count;?></span> answers</div>
				<div class="views"><span class="count"><?php echo $question->views;?></span> views</div>
			</div>
			<div class="question-content">
				<h3><?php echo $this->Html->link($question->title, ['controller' => 'questions', 'action' => 'view', $question->id]);?></h3>
				<p class="meta">
					<?php echo $this->Html->link($question->user->name, ['controller' => 'users', 'action' => 'view', $question->user->id]);?> on 
					<?php echo $question->created->format(DATE_RFC1036);?>
				</p>
			</div>
			<div class="clearfix"><!--blank--></div>
		</div>
	<?php endforeach;?>
</div>