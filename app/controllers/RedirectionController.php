<?php

class RedirectionController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data =  Input::except(array('_token')) ;
		
		$rule  =  array(
				'email'			=> 'required|email|unique:users',
				'dirname'		=> 'required|alpha_num',
				'destination'	=> 'required|alpha_num',
			) ;

		$validator = Validator::make($data,$rule);

		if ($validator->fails())
		{
				return Redirect::to('home')
						->withErrors($validator->messages());
		}
		else
		{
			/**
			 * Save User
			 *
			 */
			 
			$random_password = Str::random($length = 8);
			$email = $data['email'];
			$data_user = array();
			$data_user['email'] = $data['email'];
			$data_user['password'] = Hash::make($random_password);

			// Send confirmation mail
			Mail::send('mail_welcome', array('password'=>$random_password), function($message)
			{
				$message->to(Input::get('email'),'')->subject('Welcome to .IP!');
			});
			
			// Save data to the database
			User::saveFormData($data_user);	

			
			/**
			 * Save Redirection
			 *
			 */

			$data_redirection = array();
			$data_redirection['user_id'] = DB::table('users')->where('email', $data['email'])->first()->id;;
			$data_redirection['domain_id'] = $data['domain_id'];
			$data_redirection['dirname'] = $data['dirname'];
			$data_redirection['destination'] = $data['destination'];
			
			// Save data to the database
			Redirection::saveFormData($data_redirection);

			return Redirect::to('home')
					->withMessage('Data inserted');
		}
	}	
	
	
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
