<div class="container mar-top-50 mar-bot-50">
	<form id="firstform" method="post" action="<?= base_url('front/shoppingcart')?>">
		<h1>schedule your private lesson</h1>
		<?php if($this->session->form) { ?>
		<div class="form-group">
	  		<div class="error ">
	  			<h1>Please fill out all fields</h1>
	  		</div>
		</div>
		<?php } ?>
	  	<div class="form-group">
	  		<div class="sport error hide"><p>wait, what is a skill?</p></div>
			<label class="hide">sport</label>
	  		<div class="btn-group btn-group-lg" role="group">
		  		<div type="button" class="btn btn-default btn-1 sport <?php if ($this->session->sport === '1') echo 'active';?>" value="1">Ski</div>
		  		<div type="button" class="btn btn-default btn-2 sport <?php if ($this->session->sport === '2') echo 'active';?>" value="2">Snowboard</div>
		  		<input id="sport" type="hidden" name="sport" value="<?php if ($this->session->sport) echo $this->session->sport;?>">
			</div>
		</div>
		<div class="form-group">
			<div class="age error hide"><p>you know your age</p></div>
			<label>age</label>
	  		<div class="dropdown">
	  			<select id="age2">
	  				<option value="" placeholder="pick an age">pick an age</option>
	  				<option value="1" <?php if ($this->session->age === '1') echo 'selected';?>>child</option>
	  				<option value="2" <?php if ($this->session->age === '2') echo 'selected';?>>teen</option>
	  				<option value="3" <?php if ($this->session->age === '3') echo 'selected';?>>adult</option>
	  			</select>
	  			<input id="age" type="hidden" name="age" value="<?php if ($this->session->age) echo $this->session->age;?>">
	  		</div>
	  	</div>
	  	<div class="form-group">
	  		<div class="skill error hide"><p>wait, what is a skill?</p></div>
			<label>skill</label>
	  		<div class="dropdown">
	  			<select id="skill2">
	  				<option value="" selected="pick skill level">pick skill level</option>
	  				<option value="1" <?php if ($this->session->skill === '1') echo 'selected';?>>never tried it</option>
	  				<option value="2" <?php if ($this->session->skill === '2') echo 'selected';?>>beginner</option>
	  				<option value="3" <?php if ($this->session->skill === '3') echo 'selected';?>>intermediate</option>
	  				<option value="4" <?php if ($this->session->skill === '4') echo 'selected';?>>advanced</option>
	  			</select>
	  			<input id="skill" type="hidden" name="skill" value="<?php if ($this->session->skill) echo $this->session->skill;?>">
	  		</div>
	  	</div>
	 	<div class="form-group">
	 		<div class="date error hide"><p>what is the date?</p></div>
	 		<label>date</label>
	  		<div class="input-group date" data-provide="datepicker">
			<input type="text" id="datepicker">
			</div>
			<input id="date" type="hidden" name="date" value="">
		</div>
		<div class="hide">
			<a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
				more opinions
			</a>
			<div class="collapse" id="collapseExample">
			  	<div class="well">
					<div class="form-group">
						<div class="lesson error hide"><p>wait, what is a skill?</p></div>
						<label>lesson</label>
				  		<div class="btn-group-vertical btn-group-sm" role="group">
					  		<div type="button" class="btn btn-default btn-1 lesson <?php if ($this->session->lesson === '1' || !isset($this->session->lesson)) echo 'active';?>" value="1">private</div>
					  		<div type="button" class="btn btn-default btn-2 lesson <?php if ($this->session->lesson === '2') echo 'active';?>" value="2">semi private</div>
					  		<input id="lesson" type="hidden" name="lesson" value="<?php if ($this->session->lesson) echo $this->session->lesson; else echo '1';?>">
						</div>
					</div>
			  	</div>
			</div>
		</div>
	  	<div class="form-group">
	  		<button name="check1" value="1" type="submit" id="submit" class="btn btn-default">Submit</button>
	  	</div>
	</form>
	<div class="row">
		<p>For group lessons please call (248) 625-0800</p>
	</div>
</div>
