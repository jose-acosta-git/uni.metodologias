	<nav>
		<h1 class="logo">Motoneta</h1>

		<input type="checkbox" id="hamburger-toggle">
		<label for="hamburger-toggle" class="hamburger">
			<span class="bar"></span>
		</label>

		<ul class="nav-list">
			<li class="d-flex align-items-center"> <a href="#">Home</a> </li>
			<li class="d-flex align-items-center"> <a href="materiales-aceptados">Materiales Aceptados</a> </li>

			<li class="d-flex align-items-center"> {*Muestra u oculta dropdown en funcion a si se esta logueado o no*}
				<div class="dropdown text-center col-md-1">
					{* {if isset($smarty.session.ID_USER)&&($smarty.session.ADMIN)} *}
						<button class="btn text-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class='fas fa-cogs'></i> Administrar </button>
						<div class="dropdown-menu  text-center" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item text-secondary" href='listado-pedidos'>Listar Retiros</a>
							{* <a class="dropdown-item" href='#'> NUEVA OPCION</a>
							<a class="dropdown-item" href='#'> NUEVA OPCION</a>  *}                       
						</div>
					{* {/if} *}
				</div>
			</li>

		</ul>

	</nav>