<div class="project">
<section>
	<h1> <?php echo $project['Project']['name'] ?> </h1>
	<p class="overview"> <?php echo $project['Project']['overview'] ?> </p>

	<div class="stats">
		
		<p> <span class="semi-bold">Year:</span> <?php 
		$index = 0;
		
		foreach ($dates as $date) {
			if ($index != 0) {
				echo ' · ';
			}

			echo $this->Html->link($date['ProjectDate']['year'], array('controller' => 'projects', 'action' => 'year', $date['ProjectDate']['year']));
			$index++;
		}
		?>
		</p>

		<p> <span class="semi-bold">Tags:</span> <?php 
		$index = 0;

		foreach ($tags as $tag) {
			if ($index != 0) {
				echo ' · ';
			}
			echo $this->Html->link($tag['Tag']['displayName'], array('controller' => 'projects', 'action' => 'tag', $tag['Tag']['name']));
			$index++;
		}
		?>
		</p>

		<?php if($links && count($links) > 0) :?>
		<p> <span class="semi-bold">Links:</span> <?php 
		$index = 0;

		foreach ($links as $link) {
			if ($index != 0) {
				echo ' · ';
			}
			echo $this->Html->link($link['ProjectLink']['name'], $link['ProjectLink']['url']);
			$index++;
		}
		?>
		</p>
		<?php endif; ?>

	</div>

<?php echo $project['Project']['content'] ?> 
</section>
</div>