<ul>
<?php 
foreach($tags as $tag) {
	echo '<li>';
	echo $this->Html->link($tag['Tag']['displayName'], array('controller' => $controller, 'action' => 'tag', $tag['Tag']['name']));
	echo '</li>';
} ?>
</ul>