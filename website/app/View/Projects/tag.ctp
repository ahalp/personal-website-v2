<div class ="projects">
	<h2> <?php echo $tag_display_name ?> </h2>
	<?php 
	echo $this->element('project_cells', array('projects' => $projects)); 
	?>
</div>