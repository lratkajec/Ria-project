<nav class="navbar navbar-default">
  	<div class = "container-fluid">
  	<div class = "navbar-header">
  		<a class = "navbar-brand" href="index">Home</a>
  	</div>
		<ul class = "list-inline">  <!-- DODATI RAZNE LINKOVE -->
		  <li><a href="/index">POCETNA</a></li>
		  <li><a href="/events">EVENTI</a></li>
		  <li><a href="/addevents">DODAJ EVENT</a></li>
		  <li><a href="/admin">ADMIN</a></li>

		</ul>
		<!-- OUTPUT OVISAN O STANJU -->
		<? if (!$this->session->has("id")): ?>
		
			<ul class = "list-inline">
				<li><a href="login"><span class = "glyphicon glyphicon-log-in">Prijava</span></a></li>	
				<li><a href="signup"><span class = "glyphicon glyphicon-user">Registracija</span></a></li>
			</ul>
		
		<? else: ?>
				
		<ul class = "list-inline">
			<li><a href=""><span class = "glyphicon glyphicon-user">
			 <? echo $this->session->get("first_name")?></span></a></li>
			<li><a href="login/logout"><span class = "glyphicon glyphicon-log-out"> Odjava</span></a></li>
		
		<? endif ?>

		</ul>
	</div>
</nav>
