@extends("layout_dashboard")
@section("content")

	<h2 class='text-left'>Redirections</h2>
	<div class="col-lg-12 text-left">
		<?php
		//echo Auth::user()->id;
		//$user_redirections = DB::table('redirections')->where('user_id', Auth::user()->id)->first()->id;
		$user_redirections = DB::table('redirections')->where('user_id', '=', Auth::user()->id)->get();
		//echo '<pre>';
		//print_r($user_redirections);
		//echo '</pre>';
		$user_id = Auth::user()->id;
		$user_plan = Auth::user()->plan;
		if ($user_plan == 0)
		{
			echo '<button type="button" class="btn btn-success" data-toggle="collapse" data-target="#upgrade">upgrade</button>';
		}
		$collapse_upgrade = (($errors->any())) ? 'collapse in' : 'collapse';
		$collapse_addnew = (($errors->any())) ? 'collapse in' : 'collapse';
		?>
		
		<div id="upgrade" class="<?php echo $collapse_upgrade; ?>">
			<div class="container">
				<div class="col-lg-3">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title text-center">FREE</h3>
						</div>
						<div class="panel-body">
							<ul>
								<li>Redirections : 2</li>
								<li>Validity : one week</li>
							</ul>
						</div>
						<div class="panel-footer text-center"><h4><b>0$</b></h4></div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title text-center">SILVER</h3>
						</div>
						<div class="panel-body">
							<ul>
								<li>Redirections : 5</li>
								<li>Validity : one year</li>
							</ul>
						</div>
						<div class="panel-footer text-center">
							<h4><b>5$</b></h4>
							<button type="button" class="btn btn-success">subscribe</button>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title text-center">GOLD</h3>
						</div>
						<div class="panel-body">
							<ul>
								<li>Redirections : 10</li>
								<li>Validity : one year</li>
							</ul>
						</div>
						<div class="panel-footer text-center">
							<h4><b>10$</b></h4>
							<button type="button" class="btn btn-success">subscribe</button>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title text-center">GOLD</h3>
						</div>
						<div class="panel-body">
							<ul>
								<li>Redirections : 50</li>
								<li>Validity : one year</li>
							</ul>
						</div>
						<div class="panel-footer text-center">
							<h4><b>20$</b></h4>
							<button type="button" class="btn btn-success">subscribe</button>
						</div>
					</div>
				</div>
			</div> <!--/ .container -->		
		</div> <!--/ .upgrade -->
		
		
				
		
		
		
		
		<?php
		
		echo '<p>You have ' . count($user_redirections) . ' redirection(s) <button type="button" class="btn btn-success" data-toggle="collapse" data-target="#addnew">add new</button></p>';

		?>

		
		<div id="addnew" class="<?php echo $collapse_addnew; ?>">

			<div class="container">
			
				@if ($errors->any())
				<ul style="color:red;">
				{{ implode('', $errors->all('<li>:message</li>')) }}
				</ul>
				@endif
				@if (Session::has('message'))
				<p>{{ Session::get('message') }}</p>
				@endif
				
				{{ Form::open(array('url' => 'home/addnew')) }}
				
					{{ Form::hidden('form_name', 'addnew'); }}
					{{ Form::hidden('user_id', $user_id); }}

					<div class="row centered">
						<div class="col-lg-2 col-lg-offset-2">
							<h3><b style="font-size:120%">REDIRECT</b></h3>
						</div>
						
						<div class="col-lg-3 text-left">
							<label for="domain_id" class="control-label text-left">Domain</label>
							<?php
							$domains = array();
							foreach(DB::table('domains')->get() as $value)
							{
								$domains = $domains + array($value->id => 'www.' . $value->domain);
							}
							?>

							{{ Form::select('domain_id', $domains, 1, array('class'=>'form-control')); }}

						</div>
						<div class="col-lg-2 text-left">
							<label for="dirname" class="control-label text-left">Directory name</label>
							
							{{ Form::text('dirname', Input::old('dirname'), array('class'=>'form-control','placeholder'=>'directoryname','required','autofocus')) }}
							
						</div>
					</div>
					<br />
					<div class="row centered">
						<div class="col-lg-2 col-lg-offset-2">
							<h3><b style="font-size:120%">TO</b></h3>
						</div>
						
						<div class="col-lg-5 text-left">
							<label for="destination" class="control-label text-left">URL or IP address</label>
							
							{{ Form::text('destination', Input::old('destination'), array('class'=>'form-control','placeholder'=>'www.domain.com or 73.60.114.126','required','autofocus')) }}

						</div>
					</div>
					<div class="row centered">
						<div class="col-lg-6 col-lg-offset-4">
							<p><b>www.dotip.net/directoryname</b><br />will be redirected to <b>73.60.114.126</b></p>
						</div>
					</div>

					<div class="row centered">
						<div class="col-lg-3 col-lg-offset-6">
						
							{{ Form::submit('create this redirection', array('class'=>'btn btn-lg btn-primary btn-block')) }}

						</div>
					</div>
					
					{{ Form::close() }}
					<br /><br /><br /><br />
			</div> <!--/ .container -->		

		</div> <!--/ .addnew -->
		
		
		
		
		
		
		
		<?php
		
		
		
		
		
		
		foreach ($user_redirections as $redirection)
		{
		
			$add_days = 7;
			$date = date('Y-m-d G:i:s',strtotime('2014-04-15 22:16:12') + (24*3600*$add_days));
			//echo '<p>' . $date . ' - ' . date('Y-m-d G:i:s') . '</p>';
			
			// Create two new DateTime-objects...
			$date1 = new DateTime($date);
			$date2 = new DateTime(date('Y-m-d G:i:s'));

			// The diff-methods returns a new DateInterval-object...
			$diff = $date2->diff($date1);	
			
			$redirection_url = 'http://www.' . DB::table('domains')->where('id', $redirection->domain_id)->first()->domain . '/' . $redirection->dirname;
			?>
			<div class="well">
				<span class="label label-primary">
					<?php echo $redirection_url; ?>
				</span>
				is redirected to
				<span class="label label-primary"><?php echo $redirection->destination; ?></span>
				<a href='<?php echo $redirection_url; ?>' target='_blank' role='button' class="btn btn-info">try it!</a>
				<span class="glyphicon glyphicon-time"></span> expire in <?php echo $diff->format('%a day'); ?>
				<button type="button" class="btn btn-danger">extend</button>
			</div>

			
			<?php
		
			
			//echo '<pre>';
			//print_r($redirection);
			//echo '</pre>';
		}
		?>
	</div>
@stop