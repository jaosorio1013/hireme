<?php

use HireMe\Repositories\CategoryRepo;
use HireMe\Repositories\CandidateRepo;

class CandidatesController extends BaseController {

	protected $categoryRepo;
	protected $candicateRepo;

	public function __construct(CategoryRepo $categoryRepo, CandidateRepo $candidateRepo)
	{
		$this->categoryRepo = $categoryRepo;
		$this->candicateRepo = $candidateRepo;
	}

	public function category($slug, $id)
	{
		$category = $this->categoryRepo->find($id);
		return View::make('candidates/category', compact('category'));
	}


	public function show($slug, $id)
	{
		$candidate = $this->candicateRepo->find($id);
		return View::make('candidates/show', compact('candidate'));
	}

}