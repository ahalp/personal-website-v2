<?php
class Journal extends AppModel {


	public $metaDescriptionForRecentJournals = "Journal entries about stuff.";
	public $titleForRecentJournals = "Journal";

	public $metaDescriptionForJournalsArchive = "Archive of all journal entries.";
	public $titleForJournalsArchive = "Journal Archive";

	public $metaDescriptionForJournalTags = "Browse journal entries by tags.";
	public $titleForJournalTags = "Journal Tags";

	public function findRecentJournals() {
		$journals = $this->find('all', array(
					'order' => array('Journal.postDate DESC'),
					'limit' => 10
					));
		$journals = $this->journalsWithTagsFromJournals($journals);
		return $journals;
	}

	public function findAllJournals() {
		$projects = $this->find('all', array(
							'order' => array('Journal.postDate DESC')
							));
		return $projects;
	}


	public function findJournal($id) {
		$journal = $this->find('first', array(
							'conditions' => array('Journal.id' => $id)
							));
		$journal = $this->journalWithTagsFromJournal($journal);
		return $journal;
	}

	public function findJournalsForTagName($tagName) {

		$TagModel = ClassRegistry::init('JournalTag');
		$journalIds = $TagModel->find (	'all', array (
										'fields' => array('JournalTag.jid'),
										'conditions' => array('JournalTag.name' => $tagName)));

		if (!$journalIds) {
			return null;
		}

		$journals = array();
		foreach ($journalIds as $journalId) {
			$journal = $this->findJournal($journalId['JournalTag']['jid']);
			array_push($journals, $journal);
		}
		return $journals;
	}

	private function journalsWithTagsFromJournals($journals) {

		$journalsWithTags = array();
		$TagModel = ClassRegistry::init('Tag');

		foreach($journals as $journal) {
			$tags = $TagModel->findTagsForJournal($journal['Journal']['id']);
			$journal['Journal']['tags'] = $tags;
			array_push($journalsWithTags, $journal); 
		}

		return $journalsWithTags;
	}

	private function journalWithTagsFromJournal($journal) {
		if ($journal) {
			$TagModel = ClassRegistry::init('Tag');
			$tags = $TagModel->findTagsForJournal($journal['Journal']['id']);
			$journal['Journal']['tags'] = $tags;
			return $journal;
		} else {
			return null;
		}
	}
}