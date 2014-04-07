<div class="<?php echo $type;?>">
	<div class="votes">
		<span class="up" data-id="<?php echo $data->id; ?>" data-vote="up">&UpArrow;</span>
		<span class="votes"><?php echo $data->upvotes - $data->downvotes;?></span>
		<span class="down" data-id="<?php echo $data->id; ?>" data-vote="down">&DownArrow;</span>
	</div>
	<div class="<?php echo $type;?>-content">
		<?php echo $data->{$type}; ?>
	</div>
	<div class="meta">
		<?php echo $this->Html->link($data->user->name, ['controller' => 'users', 'action' => 'view', $data->user->id]);?> on 
		<?php echo $this->Time->nice($data->created); ?>
	</div>
	<div class="clearfix"><!--blank--></div>
	
	
	<div class="comments">
		<?php if (!empty($data->comments)): ?>
			<?php foreach ($data->comments as $comment):?>
				<div class="comment">
					<p><?php echo $comment->comment;?> - <?php echo $this->Html->link($comment->user->name, ['controller' => 'users', 'action' => 'view', $comment->user->id]);?> <?php echo $this->Time->nice($comment->created);?></p>
				</div>
			<?php endforeach;?>
		<?php endif;?>
		
		<div class="comment">
			<p><?php echo $this->Html->link('Add comment', ['controller' => 'comments', 'action' => 'add', $type, $data->id]);?></p>
		</div>
	</div>
	
</div>