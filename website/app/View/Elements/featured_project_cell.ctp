<div class="project-cell">
	<figure>
		<div>
			<?php 
			echo $this->Html->link("<span></span>", 
				array('controller' => 'projects', 'action' => 'project', $id),
				array('escape' => false));
			echo $this->Html->image($imageUrl); 
			?>
			<figcaption> <?php echo $name ?> </figcaption>
		</div>
	</figure>
</div>