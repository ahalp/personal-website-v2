<?php
	foreach ($journals as $journal) {
		echo $this->element('journal_cell', array('journal' => $journal));
	}
?>