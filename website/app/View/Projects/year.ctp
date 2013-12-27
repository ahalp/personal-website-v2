<div class ="projects">
	<h2> <?php echo $year ?> </h2>
	<?php 
	echo $this->element('project_cells', array('projects' => $projects)); 
	?>
</div>