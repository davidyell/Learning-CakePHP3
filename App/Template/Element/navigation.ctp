<nav>
	<ul>
		<li><?php echo $this->Html->link('Latest questions', ['controller' => 'questions', 'action' => 'index']);?></li>
		<li><?php echo $this->Html->link('Ask a question', ['controller' => 'questions', 'action' => 'add']);?></li>
		
		<?php if (\Cake\Controller\Component\AuthComponent::user()): ?>
			<li><?php echo $this->Html->link('Logout ' . \Cake\Controller\Component\AuthComponent::user('name'), ['controller' => 'users', 'action' => 'logout']);?></li>
		<?php else: ?>
			<li><?php echo $this->Html->link('Login', ['controller' => 'users', 'action' => 'login']);?></li>
		<?php endif; ?>
	</ul>
</nav>