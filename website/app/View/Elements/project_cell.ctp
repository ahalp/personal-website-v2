<?php
$id = $project['Project']['id'];
$imageUrl = $project['Project']['imageUrl'];
$name = $project['Project']['name'];
$overview = $project['Project']['overview'];

if ($count == 1) {
	$cell_class = "project-cell pc-one-col";
} else if ($count == 2) {
	$cell_class = "project-cell pc-two-cols";
} else {
	$cell_class = "project-cell pc-three-cols";
}

?>
<div class="<?php echo $cell_class ?>">
	<figure>
		<div>
			<?php 
			echo $this->Html->link(
				$this->Html->image($imageUrl),
				array('controller' => 'projects', 'action' => 'project', $id), 
				array('escape' => false));

			// echo $this->Html->image($imageUrl);
	
			// if (strlen($name) > 22) {
			// 	$name = substr($name, 0, 20) . '...';
			// } 
			?>
			<p> <?php echo $this->Html->link($name, array('controller' => 'projects', 'action' => 'project', $id)); ?> </p>
		</div>
	</figure>
</div>