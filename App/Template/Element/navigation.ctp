<nav>
	<ul>
		<li><?php echo $this->Html->link('Latest questions', ['controller' => 'questions', 'action' => 'index']);?></li>
		<li><?php echo $this->Html->link('Ask a question', ['controller' => 'questions', 'action' => 'add']);?></li>
		<li><?php echo $this->Html->link('Login', ['controller' => 'users', 'action' => 'login']);?></li>
	</ul>
</nav>