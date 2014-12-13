<?php

use HireMe\Managers\RegisterManager;
use HireMe\Managers\AccountManager;
use HireMe\Repositories\CandidateRepo;

class UsersController extends BaseController {

	protected $candidateRepo;

	public function __construct(CandidateRepo $candidateRepo)
	{
		$this->candidateRepo = $candidateRepo;
	}

	public function signUp()
	{
		return View::make('users/sign-up');
	}

	public function register()
	{
		$user = $this->candidateRepo->newCandidate();
		$manager = new RegisterManager($user, Input::all());

		if($manager->save())
		{
			return Redirect::route('home');
		}

		return Redirect::back()->withInput()->withErrors($manager->getErrors());
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

		if($manager->save())
		{
			return Redirect::route('home');
		}

		return Redirect::back()->withInput()->withErrors($manager->getErrors());
	}

} 