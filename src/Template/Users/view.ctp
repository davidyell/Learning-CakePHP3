<div class="users view">
	<h2><?php echo $user->name;?></h2>
	<ul>
		<li>Questions:
			<?php
			if (!empty($user->questions)) {
				echo "<ul>";
				foreach ($user->questions as $question) {
					echo "<li>" . $question->title . "</li>";
				}
				echo "</ul>";
			} else {
				echo "No questions";
			}
			?>
		</li>
		<li>Answers
			<?php
			if (!empty($user->answers)) {
				echo "<ul>";
				foreach ($user->answers as $answers) {
					echo "<li>" . $answers->answer . "</li>";
				}
				echo "</ul>";
			} else {
				echo "No answers";
			}
			?>
		</li>
	</ul>
</div>