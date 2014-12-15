<?php

use HireMe\Managers\RegisterManager;
use HireMe\Managers\AccountManager;
use HireMe\Repositories\CandidateRepo;
use HireMe\Repositories\CategoryRepo;

class UsersController extends BaseController {

	protected $candidateRepo;
	protected $categoryRepo;

	public function __construct(CandidateRepo $candidateRepo, CategoryRepo $categoryRepo)
	{
		$this->candidateRepo = $candidateRepo;
		$this->categoryRepo = $categoryRepo;
	}

	public function signUp()
	{
		return View::make('users/sign-up');
	}

	public function register()
	{
		$user = $this->candidateRepo->newCandidate();
		$manager = new RegisterManager($user, Input::all());
		$manager->save();

		return Redirect::route('home');
	}

	public function account()
	{
		$user = Auth::user();
		return View::make('users/account', compact('user'));
	}

	public function updateAccount()
	{
		$user = Auth::user();
		$manager = new AccountManager($user, Input::all());
		$manager->save();

		return Redirect::route('home');
	}

	public function profile()
	{
		$user = Auth::user();
		$candidate = $user->candidate;

		$categories = $this->categoryRepo->geList();
		$job_types = \Lang::get('utils.job_types');

		return View::make('users/profile', compact('user', 'candidate', 'categories', 'job_types'));
	}

	public function updateProfile()
	{
		$user = Auth::user();
		$candidate = $user->candidate;
		$manager = new ProfileManager($candidate, Input::all());
		$manager->save();

		return Redirect::route('home');
	}

} 