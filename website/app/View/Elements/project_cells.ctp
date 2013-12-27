<?php
	$class = "project-cells";
	if (count($projects) > 2) {
		$class = $class . " p-three-cols";
	} else if (count($projects) == 2) {
		$class = $class . " p-two-cols";
	} else if (count($projects) == 1) {
		$class = $class . " p-one-col";
	}
?>
<div class="<?php echo $class ?>">
<?php
foreach ($projects as $project) {
	echo $this->element('project_cell', array('project' => $project, 'count' => count($projects)));
} ?>
</div>