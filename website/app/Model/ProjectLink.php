<?php

class ProjectLink extends AppModel {

	public function findLinksForProject($pid) {
		$links = $this->find(	'all', array(
								'conditions' => array('ProjectLink.pid' => $pid)));
		return $links;
	}

}