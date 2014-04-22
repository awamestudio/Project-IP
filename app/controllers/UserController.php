<?php

class UserController extends BaseController {

	public function doLogout()
	{
		Auth::logout(); // log the user out of our application
		return Redirect::to('home'); // redirect the user to the login screen
	}
	
	public function doLogin()
	{
	
		if (Input::server("REQUEST_METHOD") == "POST")
		{
			// validate the info, create rules for the inputs
			$rules = array(
				'email'    => 'required|email', // make sure the email is an actual email
				'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
			);

			// run the validation rules on the inputs from the form
			$validator = Validator::make(Input::all(), $rules);

			// if the validator fails, redirect back to the form
			if ($validator->fails()) {
				return Redirect::to('home')
					->withErrors($validator) // send back all errors to the login form
					->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
			} else {

				// create our user data for the authentication
				$userdata = array(
					'email' 	=> Input::get('email'),
					'password' 	=> Input::get('password')
				);

				// attempt to do the login
				if (Auth::attempt($userdata)) {

					// validation successful!
					// redirect them to the secure section or whatever
					return Redirect::to('users/dashboard');

				} else {	 	

					// validation not successful, send back to form	
					return Redirect::to('home');

				}

			}
		}
	}
	
	public function requestAction()
	{
		$data = [
			"requested" => Input::old("requested")
		];
		if (Input::server("REQUEST_METHOD") == "POST")
		{
			$validator = Validator::make(Input::all(), [
				"email" => "required"
			]);
			if ($validator->passes())
			{
				$credentials = [
					"email" => Input::get("email")
				];
				Password::remind($credentials,
					function($message, $user)
					{
						$message->from("chris@example.com");
					}
				);
				$data["requested"] = true;
				return Redirect::route("request")
					->withInput($data);
			}
		}
		return View::make("request", $data);
	}
	
	public function resetAction()
	{
		$token = "?token=" . Input::get("token");
		$errors = new MessageBag();
		if ($old = Input::old("errors"))
		{
			$errors = $old;
		}
		$data = [
			"token"  => $token,
			"errors" => $errors
		];
		if (Input::server("REQUEST_METHOD") == "POST")
		{
			$validator = Validator::make(Input::all(), [
				"email"                 => "required|email",
				"password"              => "required|min:6",
				"password_confirmation" => "same:password",
				"token"                 => "exists:token,token"
			]);
			if ($validator->passes())
			{
				$credentials = [
					"email" => Input::get("email")
				];
				Password::reset($credentials,
					function($user, $password)
					{
						$user->password = Hash::make($password);
						$user->save();
						Auth::login($user);
						return Redirect::route("user/profile");
					}
				);
			}
			$data["email"] = Input::get("email");
			$data["errors"] = $validator->errors();
			return Redirect::to(URL::route("reset") . $token)
				->withInput($data);
		}
		return View::make("reset", $data);
	}
	
	public function profileAction()
	{
		return View::make("users/dashboard");
	}
	
}
