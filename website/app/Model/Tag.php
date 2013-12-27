<?php

class Tag extends AppModel {

	public function displayNameForTagName($name) {
		$tag = $this->find(	'first', array (
							'fields' => array('Tag.displayName'),
							'conditions' => array('Tag.name' => $name)));
		if ($tag) {
			return $tag['Tag']['displayName'];
		}
		return null;
	}

	public function findTagsForProject($pid) {

		$ProjectTagModel = ClassRegistry::init('ProjectTag');
		$project_tags = $ProjectTagModel->find(	'all', array(
												'conditions' => array('ProjectTag.pid' => $pid)
												));
		if (!$project_tags) {
			return null;
		}

		$tags = array();
		foreach ($project_tags as $project_tag) {
			$tag = $this->find(	'first', array(
								'conditions' => array('Tag.name' => $project_tag['ProjectTag']['name'])
								));
			array_push($tags, $tag);
		}

		return $tags;
	}

	public function findProjectTags()
	{
		$ProjectTagModel = ClassRegistry::init('ProjectTag');
		$project_tags = $ProjectTagModel->find(	'all', array('fields'=>'DISTINCT ProjectTag.name',
										'order' => array('ProjectTag.name ASC')
										));
		if (!$project_tags) {
			return null;
		}

		$tags = array();
		foreach ($project_tags as $project_tag) {
			$tag = $this->find(	'first', array(
								'conditions' => array('Tag.name' => $project_tag['ProjectTag']['name'])
								));
			array_push($tags, $tag);
		}

		return $tags;	
	}

	public function findTagsForJournal($jid) {
		$JournalTagModel = ClassRegistry::init('JournalTag');
		$journal_tags = $JournalTagModel->find(	'all', array(
												'conditions' => array('JournalTag.jid' => $jid)
												));
		if (!$journal_tags) {
			return null;
		}

		$tags = array();
		foreach ($journal_tags as $journal_tag) {
			$tag = $this->find(	'first', array(
								'conditions' => array('Tag.name' => $journal_tag['JournalTag']['name'])
								));
			array_push($tags, $tag);
		}

		return $tags;
	}

	public function findJournalTags() {
		$JournalTagModel = ClassRegistry::init('JournalTag');
		$journal_tags = $JournalTagModel->find(	'all', array('fields'=>'DISTINCT JournalTag.name',
										'order' => array('JournalTag.name ASC')
										));
		if (!$journal_tags) {
			return null;
		}

		$tags = array();
		foreach ($journal_tags as $journal_tag) {
			$tag = $this->find(	'first', array(
								'conditions' => array('Tag.name' => $journal_tag['JournalTag']['name'])
								));
			array_push($tags, $tag);
		}

		return $tags;
	}
}