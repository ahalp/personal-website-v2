<?php
$id = $journal['Journal']['id'];
$title = $journal['Journal']['title'];
$overview = $journal['Journal']['overview'];
$content = $journal['Journal']['content'];
$postDate = $journal['Journal']['postDate'];
$tags = $journal['Journal']['tags'];
$imageUrl = $journal['Journal']['imageUrl'];
?>
<div class="journal">
	<article>
	<?php if (strlen($imageUrl) > 0) : ?>
		<div class="journal-image">
			<figure>
			<?php echo $this->Html->image($imageUrl); ?>
			</figure>
		</div>
	<?php endif; ?>

	<?php 
		if (strlen($imageUrl) > 0) {
			$className = "image";
		} else {
			$className = "no-image";
		}
	?>
		<div class="<?php echo "journal-content " . $className; ?>">
			<h1> <?php 
			if ($direct) {
				echo $title;
			} else {
				echo  $this->Html->link($title, array('controller' => 'journals', 'action' => 'journal', $id)); 
			}
			?> </h1>
			<div class="journal-stats">
				<div>
					<span class="regular spaces">Posted: </span>
					<time class="spaces"> <?php echo $postDate ?>     </time>	
				</div>
				<?php if($tags) :?>
				<div>
					<span class="regular spaces">Tags: </span>
					<span> 
					<?php 
					$index = 0;
					foreach ($tags as $tag) {
						if ($index != 0) {
							echo ' · ';
						}
						echo $this->Html->link($tag['Tag']['displayName'], array('controller' => 'journals', 'action' => 'tag', $tag['Tag']['name']));
						$index++;
					}
					?>
					</span>
				</div>
				<?php endif; ?>
			</div>
			<div class="journal-data">
			<?php echo $content ?>
			</div>
		</div>
	</article>
</div>