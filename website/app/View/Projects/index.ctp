<div class="projects">
	<h2> Projects </h2>
	<div> 
		<?php
		echo $this->Html->link('All', array('controller' => 'projects', 'action' => 'index'), array('class' => 'regular'));
		echo ' · ';
		echo $this->Html->link('Development', array('controller' => 'projects', 'action' => 'development'));
		echo ' · ';
		echo $this->Html->link('Other', array('controller' => 'projects', 'action' => 'other'));
		 ?>
	</div>
	<?php
	echo $this->element('project_cells', array('projects' => $projects));
	echo $this->element('project_cells_footer');
	?>
</div>