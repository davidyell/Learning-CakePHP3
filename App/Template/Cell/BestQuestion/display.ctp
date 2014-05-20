<div class="cell best-question">
	<h3>Most upvoted question</h3>
	<p><?php echo $this->Html->link($bestQuestion->title, ['controller' => 'questions', 'action' => 'view', $bestQuestion->id]);?></p>
</div>