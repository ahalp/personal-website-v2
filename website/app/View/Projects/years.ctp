<div class="link-list">
<h2> <?php echo $title_for_layout ?> </h2>
<ul>
<?php 
foreach($years as $year) {
	echo '<li>';
	echo $this->Html->link($year['ProjectDate']['year'], array('controller' => 'projects', 'action' => 'year', $year['ProjectDate']['year']));
	echo '</li>';
} ?>
</ul>
</div>