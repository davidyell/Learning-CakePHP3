<div class="cell best-question">
	<?php echo $this->Html->link("<h3>" . $bestQuestion->getTitle() . "</h3>", ['controller' => 'questions', 'action' => 'view', $bestQuestion->getId()]);?>
</div>