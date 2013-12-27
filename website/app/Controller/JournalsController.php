<?php
class JournalsController extends AppController {
	
	public $helpers = array('Html');

	public $uses = array('Journal', 'Tag');

	public function index() {
		$this->set('journals', $this->Journal->findRecentJournals());
		$this->set('meta_description', $this->Journal->metaDescriptionForRecentJournals);
		$this->set('title_for_layout', $this->Journal->titleForRecentJournals);
	}
	
	public function archive() {
		$this->set('journals', $this->Journal->findAllJournals());
		$this->set('meta_description', $this->Journal->metaDescriptionForJournalsArchive);
		$this->set('title_for_layout', $this->Journal->titleForJournalsArchive);
	}

	public function journal($id = null) {
		
		if (!$id) {
			throw new NotFoundException(__('Invalid Journal'));
		}

		$journal = $this->Journal->findJournal($id);
		if (!$journal) {
			throw new NotFoundException(__('Invalid Journal'));
		}

		$this->set('journal', $journal);
		$this->set('title_for_layout', $journal['Journal']['title']);
		$this->set('meta_description', $journal['Journal']['overview']);
	}


	public function tag($tag_name = null) {

		if (!$tag_name) {
			throw new NotFoundException(__('Invalid Journal Tag'));
		}

		$journals = $this->Journal->findJournalsForTagName($tag_name);
		if (!$journals || count($journals) == 0) {
			throw new NotFoundException(__('Invalid Journal Tag'));
		}

		$tag_display_name = $this->Tag->displayNameForTagName($tag_name);


		$this->set('journals', $journals);
		$this->set('meta_description', $this->Journal->metaDescriptionForRecentJournals);
		$this->set('title_for_layout', $tag_display_name);
		$this->set('tag_display_name', $tag_display_name);
	}

	public function tags() {
		$tags = $this->Tag->findJournalTags();
		$this->set('tags', $tags);
		$this->set('title_for_layout', $this->Journal->titleForJournalTags);
		$this->set('meta_description', $this->Journal->metaDescriptionForJournalTags);
	}

}