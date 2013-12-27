<?php
	foreach ($journals as $journal) {
		echo $this->element('journal', array('journal' => $journal, 'direct' => FALSE));
		echo '<hr>';
	}
?>