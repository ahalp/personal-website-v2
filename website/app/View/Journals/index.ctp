<div class="journals">
<h2> Journal </h2> 
<?php echo $this->element('journals', array('journals' => $journals)); ?>
<div class="links-footer">
<?php echo $this->Html->link('Archive', array('controller' => 'journals', 'action' => 'archive')); ?>
<span class="spaces">  · </span>
<?php echo $this->Html->link('Tags', array('controller' => 'journals', 'action' => 'tags')); ?>
</div> 
</div>