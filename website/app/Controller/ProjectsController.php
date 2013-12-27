<?php
class ProjectsController extends AppController {
	
	public $helpers = array('Html');

	public $uses = array('Project', 'Tag', 'ProjectDate', 'ProjectLink');

	public function selected() {
		$this->set('selected_projects', $this->Project->findSelectedProjects());
		$this->set('meta_description', 	$this->Project->metaDescriptionForSelectedProjects);
		$this->set('title_for_layout', 	$this->Project->titleForSelectedProjects);
	}

	public function index() {
		$this->set('projects', $this->Project->findAllProjects());
		$this->set('meta_description', $this->Project->metaDescriptionForAllProjects);
		$this->set('title_for_layout', $this->Project->titleForAllProjects);
	}

	public function development() {
		$this->set('projects', $this->Project->findDevelopmentProjects());
		$this->set('meta_description', $this->Project->metaDescriptionForAllProjects);
		$this->set('title_for_layout', $this->Project->titleForAllProjects);
	}

	public function other() {
		$this->set('projects', $this->Project->findOtherProjects());
		$this->set('meta_description', $this->Project->metaDescriptionForAllProjects);
		$this->set('title_for_layout', $this->Project->titleForAllProjects);
	}

	public function project($id = null) {
		
		if (!$id) {
			throw new NotFoundException(__('Invalid Project'));
		}

		$project = $this->Project->findProject($id);
		if (!$project) {
			throw new NotFoundException(__('Invalid Project'));
		}

		$this->set('project', $project);

		$tags = $this->Tag->findTagsForProject($id);
		$this->set('tags', $tags);

		$dates = $this->ProjectDate->findDatesForProject($id);
		$this->set('dates', $dates);

		$links = $this->ProjectLink->findLinksForProject($id);
		$this->set('links', $links);

		$this->set('title_for_layout', $project['Project']['name']);
		$this->set('meta_description', $project['Project']['meta']);
	}

	public function tag($tag_name = null) {
		if (!$tag_name) {
			throw new NotFoundException(__('Invalid Project Tag'));
		}

		$projects = $this->Project->findProjectsForTagName($tag_name);
		if (!$projects || count($projects) == 0) {
			throw new NotFoundException(__('Invalid Project Tag'));
		}

		$tag_display_name = $this->Tag->displayNameForTagName($tag_name);

		$this->set('projects', $projects);
		$this->set('title_for_layout', $tag_display_name);
		$this->set('tag_display_name', $tag_display_name);
		$this->set('meta_description', $this->Project->metaDescriptionForAllProjects);
	}

	public function tags() {
		$tags = $this->Tag->findProjectTags();
		$this->set('tags', $tags);
		$this->set('title_for_layout', $this->Project->titleForTags);
		$this->set('meta_description', $this->Project->metaDescriptionForTags);
	}

	public function year($year = null) {
		if (!$year) {
			throw new NotFoundException(__('Invalid Project Year'));
		}

		$projects = $this->Project->findProjectsForYear($year);
		if (!$projects || count($projects) == 0) {
			throw new NotFoundException(__('Invalid Project Year'));
		}

		$this->set('projects', $projects);
		$this->set('title_for_layout', $year);
		$this->set('year', $year);
		$this->set('meta_description', $this->Project->metaDescriptionForAllProjects);
	}

	public function years() {
		$years = $this->ProjectDate->findDatesForProjects();
		$this->set('years', $years);
		$this->set('title_for_layout', $this->Project->titleForYears);
		$this->set('meta_description', $this->Project->metaDescriptionForYears);
	}

}