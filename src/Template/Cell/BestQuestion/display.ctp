<div class="cell best-question">
	<h3>Most upvoted question</h3>
	<p><span class="label label-info"><?php echo $bestQuestion->getVotes();?></span> <?php echo $this->Html->link($bestQuestion->title, ['controller' => 'questions', 'action' => 'view', $bestQuestion->id]);?></p>
</div>