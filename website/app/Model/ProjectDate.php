<?php

class ProjectDate extends AppModel {
	public function findDatesForProject($pid) {
		$dates = $this->find(	'all', array(
								'conditions' => array('ProjectDate.pid' => $pid)
								));
		return $dates;
	}

	public function findDatesForProjects() {
		$dates = $this->find('all', array('fields'=>'DISTINCT ProjectDate.year',
										'order' => array('ProjectDate.year DESC')
										));
		return $dates;
	}
}