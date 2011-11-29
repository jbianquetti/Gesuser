<?php 
	if(!defined('APP_DIR')){
		include_once("../config.php");
		session_name(SESSION_NAME);
		session_start();
	}
?>
	<h1>G3suser</h1>
	<ul id="right_sub">
		<li>
			<a href="settings" class="simple_load">
				<img src="http://<?php echo SERVER_NAME.APP_DIR; ?>/img/common/conf_icon.png" alt="configuration" name="add" width="16" height="16"/>
				<span>Configuraci&oacute;n</span>
			</a>
		</li>
	</ul>
	<div class="clear"></div>
	<div id="main_sections">
		<ul id="left_sec_main">
            <li class="inactive" id="module-home"><a class="main_menu" href="home">Inicio</a></li>
			<li class="inactive" id="module-user"><a class="main_menu" href="user">Usuarios</a></li>
			<li class="inactive" id="module-contentfilter"><a class="main_menu" href="filter">Filtro de contenidos</a></li>
			<li class="inactive" id="module-remoteshutdown"><a class="main_menu" href="remote">Apagado remoto</a></li>
		</ul>
		<ul id="right_sec_main">
			<li><span id="user_name"><?php echo $_SESSION['user']?></span></li>
			<li><span>|</span></li>
			<li><a href="logout" class="important_link" parameters=""><span>Cerrar sesi&oacute;n</span></a></li>
		</ul>
		<div class="clear"></div>
	</div>
	<div id="sub_sections">
	</div>
	<div class="clear"></div>