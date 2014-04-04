<div class="<?php echo $type;?>">
	<div class="votes">
		<span class="up" data-id="<?php echo $question->id; ?>" data-vote="up">&UpArrow;</span>
		<span class="votes"><?php echo $question->upvotes - $question->downvotes;?></span>
		<span class="down" data-id="<?php echo $question->id; ?>" data-vote="down">&DownArrow;</span>
	</div>
	<div class="question-content">
		<?php echo $question->question; ?>
	</div>
	<div class="meta">
		<?php echo $this->Html->link($question->user->name, ['controller' => 'users', 'action' => 'view', $question->user->id]);?> on 
		<?php echo $question->created->format(DATE_RFC1036); ?>
	</div>
	<div class="clearfix"><!--blank--></div>
	
	<div class="comments">
		<?php foreach ($question->comments as $comment):?>
			<div class="comment">
				<p><?php echo $comment->comment;?> - <?php echo $this->Html->link($comment->user->name, ['controller' => 'users', 'action' => 'view', $comment->user->id]);?> <?php echo $comment->created->format(DATE_RFC1036);?></p>
			</div>
		<?php endforeach;?>
	</div>
</div>