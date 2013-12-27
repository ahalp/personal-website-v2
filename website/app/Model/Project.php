<?php

class Project extends AppModel {

	private function baseFields() {
		return array('Project.name', 'Project.id', 'Project.imageUrl', 'Project.overview');	
	} 

	public function findSelectedProjects() {
		$projects = $this->find('all', array(
					'fields' => $this->baseFields(),
					'conditions' => array('Project.selected' => '1'),
					'order' => array('Project.sort DESC')
					));
		return $projects;
	}

	public function findAllProjects() {
		$projects = $this->find('all', array(
							'fields' => $this->baseFields(),
							'order' => array('Project.sort DESC')
							));
		return $projects;
	}

	public function findDevelopmentProjects() {
		$projects = $this->find('all', array(
							'fields' => $this->baseFields(),
							'conditions' => array('Project.type' => 'development'),
							'order' => array('Project.sort DESC')
							));
		return $projects;
	}

	public function findOtherProjects() {
		$projects = $this->find('all', array(
							'fields' => $this->baseFields(),
							'conditions' => array('Project.type !=' => 'development'),
							'order' => array('Project.sort DESC')
							));
		return $projects;
	}

	public function findProject($id) {
		$project = $this->find('first', array(
							'conditions' => array('Project.id' => $id)
							));
		return $project;
	}

	public function findProjectsForTagName($tagName) {

		$TagModel = ClassRegistry::init('ProjectTag');
		$projectIds = $TagModel->find (	'all', array (
										'fields' => array('ProjectTag.pid'),
										'conditions' => array('ProjectTag.name' => $tagName)));

		if (!$projectIds) {
			return null;
		}

		$projects = array();
		foreach ($projectIds as $projectId) {
			$project = $this->findProject($projectId['ProjectTag']['pid']);
			array_push($projects, $project);
		}

		return $projects;
	}

	public function findProjectsForYear($year) {

		$ProjectDateModel = ClassRegistry::init('ProjectDate');
		$projectIds = $ProjectDateModel->find (	'all', array (
										'fields' => array('ProjectDate.pid'),
										'conditions' => array('ProjectDate.year' => $year)));

		if (!$projectIds) {
			return null;
		}

		$projects = array();
		foreach ($projectIds as $projectId) {
			$project = $this->findProject($projectId['ProjectDate']['pid']);
			array_push($projects, $project);
		}

		return $projects;
	}

	public $titleForAllProjects = "Deepkanwal Plaha";
	public $metaDescriptionForAllProjects = "A collection of personal projects by Deepkanwal Plaha.";

	public $titleForSelectedProjects = "Deepkanwal Plaha";
	public $metaDescriptionForSelectedProjects = "A collection of personal projects by Deepkanwal Plaha.";

	public $titleForTags = "Project Tags";
	public $metaDescriptionForTags = "Browse projects by using tags.";

	public $titleForYears = "Project Years";
	public $metaDescriptionForYears = "Browse projects by the years they were worked on.";
	

}
