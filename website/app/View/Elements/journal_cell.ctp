<?php
$id = $journal['Journal']['id'];
$title = $journal['Journal']['title'];
$overview = $journal['Journal']['overview'];
$postDate = $journal['Journal']['postDate'];
?>
<div class="journal-cell">
	<section>
		<h1> <?php echo  $this->Html->link($title, array('controller' => 'journals', 'action' => 'journal', $id)); ?> </h1>
		<div class="jc-time">
			<time><?php echo $postDate ?></time>	
		</div>
		<div class="jc-overview">
			<?php echo $overview ?>
		</div>
	</section>
</div>