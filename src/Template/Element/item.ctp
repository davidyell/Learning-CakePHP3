<div class="<?php echo $type;?>">
	<div class="votes">
		<?php echo $this->Html->link("<span class='vote up'><span class='glyphicon glyphicon-arrow-up'></span></span>", ['controller' => \Cake\Utility\Inflector::pluralize($type), 'action' => 'vote', 'up', $data->id], ['escape' => false, 'data-dir' => 'up', 'data-id' => $data->id, 'data-controller' => \Cake\Utility\Inflector::pluralize($type)]);?>
		<span class="votes"><?php echo $data->upvotes - $data->downvotes;?></span>
		<?php echo $this->Html->link("<span class='vote down'><span class='glyphicon glyphicon-arrow-down'></span></span>", ['controller' => \Cake\Utility\Inflector::pluralize($type), 'action' => 'vote', 'down', $data->id], ['escape' => false, 'data-dir' => 'down', 'data-id' => $data->id, 'data-controller' => \Cake\Utility\Inflector::pluralize($type)]);?>
	</div>
	<div class="<?php echo $type;?>-content">
		<?php echo $data->{$type}; ?>
	</div>
	<div class="meta">
		<?php echo $this->Html->link($data->user->name, ['controller' => 'users', 'action' => 'view', $data->user->id]);?> on 
		<?php echo $this->Time->nice($data->created); ?>
		
		<?php
		if ($this->Session->read('Auth.User.id') == $data->user->id) {
			echo $this->Html->link('Edit', ['controller' => 'questions', 'action' => 'edit', $data->id], ['class' => 'btn btn-xs btn-primary']);
		}
		?>
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