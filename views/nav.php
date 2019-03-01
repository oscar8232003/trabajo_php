


		<header class="container-fluid p-0">
			<!--NAVBAR!-->
			<div class="row m-0 justify-content-center barra_navbar">
				<div class="col-12 col-sm-8 col-md-8 col-lg-10 col-xl-7 p-0 m-0">
					<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
					  <a class="navbar-brand" href="index.php">Foro Abierto</a>
					  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".colapsable" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					   <span class="navbar-toggler-icon"></span>
					  </button>

					  <div class="collapse navbar-collapse colapsable" id="navbarSupportedContent">
					    <ul class="navbar-nav mr-auto">

						    <li class="nav-item">
						        <a class="nav-link" href="index.php">Inicio<span class="sr-only">(current)</span></a>
						    </li>
							<?php if(isset($_SESSION['usuario'])) {?>
						    <li class="nav-item">
						        <a class="nav-link" href="contenido.php">Foro<span class="sr-only">(current)</span></a>
						    </li>
						    <?php } ?>
							<?php if(isset($_SESSION['usuario']) && $_SESSION['tipo']=="administrador") {?>
						    <li class="nav-item">
						        <a class="nav-link" href="usuarios.php">Gestion de Usuarios<span class="sr-only">(current)</span></a>
						    </li>
					  		<?php } ?>
					    </ul>
					     <?php if(isset($_SESSION['usuario'])) {?>
					     	<h5 class="mr-3 mb-0" style="color: white;">Hola <?php echo $_SESSION['nombre']?></h5>
					     	<a href="salir.php"><button type="button" class="btn btn-danger mr-4">Cerrar Sesion</button></a>
					     <?php } else {?>
					     <button type="button" class="btn btn-primary mr-4" data-toggle="modal" data-target="#Modal">Ingresar</button>
					     <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#Modal_registro">Registrarse</button>
					     <?php };?>
					  </div>
					</nav>
				</div>
			</div>

			<!--VENTANA MODAL INGRESAR-->
			<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			    	<!--MODAL HEADER-->
			      <div class="modal-header color_celeste pr-0 ">
			      	<div class="container-fluid">
			      		<div class="row">
			      			<div class="col-10 col-sm-11">
				        		<h4 class="modal-title modal_titulo" id="exampleModalLabel">INGRESAR</h4>
				        	</div>
				        	<div class="col-1">
					       		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          	<span aria-hidden="true" class="text-muted"> &times;</span>
					        	</button>
				        	</div>
				        </div>
			        </div>
			      </div>
			      <!--MODAL BODY-->
			      <div class="modal-body">
			      	<div class="container-fluid">
			      		<div class="col-12">
					        <form action="index.php" method="post" name="form_ingresar" onsubmit="return validar_entrada()">
					          <div class="form-group">
					            <label for="usuario" class="col-form-label"><strong>Usuario</strong></label>
					            <div class="input-group mb-2">
							        <div class="input-group-prepend">
							          <div class="input-group-text"><span data-icon="b"></span></div>
							        </div>
							        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
							        <div class="invalid-feedback">
								    	<p id="usuario-invalid" class="m-0"></p>
								    </div>
								    <div class="valid-feedback">
								    	<p id="usuario-valid" class="m-0">Correcto</p>
								    </div>
							     </div>
					          </div>
					          <div class="form-group">
					            <label for="password" class="col-form-label"><strong>Password</strong></label>
					            <div class="input-group mb-2">
							        <div class="input-group-prepend">
							          <div class="input-group-text"><span data-icon="d"></span></div>
							        </div>
							        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
							        <div class="invalid-feedback">
								    	<p id="password-invalid" class="m-0"></p>
								    </div>
								    <div class="valid-feedback">
								    	<p id="password-valid" class="m-0">Correcto</p>
								    </div>
							     </div>
					          </div>

					          <input type="submit" class="btn btn-primary btn-block mt-4" value="Ingresar" name="Ingresar">
					        </form>
				        </div>
			        </div>
			      </div>
			      <div class="modal-footer">
			      	<div class="container">
						<div class="col-12 text-right mr-0">
							¿No tienes una cuenta registrada? | <strong><a href="#Modal_registro" data-dismiss="modal" data-toggle="modal">Registrarse</a></strong>
						</div>
			        </div>
			      </div>
			    </div>
			  </div>
			</div>

			<!--VENTANA MODAL REGISTRO-->
			<div class="modal fade" id="Modal_registro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			    	<!--MODAL HEADER-->
			      <div class="modal-header color_celeste pr-0 ">
			      	<div class="container-fluid">
			      		<div class="row">
			      			<div class="col-10 col-sm-11">
				        		<h4 class="modal-title modal_titulo" id="exampleModalLabel">REGISTRARSE</h4>
				        	</div>
				        	<div class="col-1">
					       		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          	<span aria-hidden="true" class="text-muted"> &times;</span>
					        	</button>
				        	</div>
				        </div>
			        </div>
			      </div>
			     <!--MODAL BODY-->
			      <div class="modal-body">
			      	<div class="container-fluid">
			      		<div class="col-12">
					        <form action="index.php" method="post" name="form_registro" enctype="multipart/form-data" onsubmit="return validar_registro()">
					          <div class="form-group">
					            <label for="nombre_registro" class="col-form-label"><strong>Nombre*</strong></label>
					            <div class="input-group mb-2">
							        <div class="input-group-prepend">
							          <div class="input-group-text"><span data-icon="i"></span></div>
							        </div>
							        <input type="text" class="form-control" id="nombre_registro" name="nombre_registro" placeholder="Ingrese su nombre">
							        <div class="invalid-feedback">
								    	<p id="nombre_registro-invalid" class="m-0"></p>
								    </div>
								    <div class="valid-feedback">
								    	<p id="nombre_registro-valid" class="m-0">Correcto</p>
								    </div>
							     </div>
					          </div>

					          <div class="form-group">
					          <label for="apellido_registro" class="col-form-label"><strong>Apellido*</strong></label>
					            <div class="input-group mb-2">
							        <div class="input-group-prepend">
							          <div class="input-group-text"><span data-icon="g"></span></div>
							        </div>
							        <input type="text" class="form-control" id="apellido_registro" name="apellido_registro" placeholder="Ingrese su apellido">
							        <div class="invalid-feedback">
								    	<p id="apellido_registro-invalid" class="m-0"></p>
								    </div>
								    <div class="valid-feedback">
								    	<p id="apellido_registro-valid" class="m-0">Correcto</p>
								    </div>
							     </div>
					          </div>
					           <div class="form-group">
					            <label for="usuario_registro" class="col-form-label"><strong>Usuario*</strong></label>
					            <div class="input-group mb-2">
							        <div class="input-group-prepend">
							          <div class="input-group-text"><span data-icon="b"></span></div>
							        </div>
							        <input type="text" class="form-control" name="usuario_registro" id="usuario_registro" placeholder="Ingrese su Usuario">
							        <div class="invalid-feedback">
								    	<p id="usuario_registro-invalid" class="m-0"></p>
								    </div>
								    <div class="valid-feedback">
								    	<p id="usuario_registro-valid" class="m-0">Correcto</p>
								    </div>
							     </div>
					          </div>
					          <div class="form-group">
					            <label for="contraseña_registro" class="col-form-label"><strong>Contraseña*</strong></label>
					            <div class="input-group mb-2">
							        <div class="input-group-prepend">
							          <div class="input-group-text"><span data-icon="d"></span></div>
							        </div>
							        <input type="password" class="form-control" id="contraseña_registro" name="contraseña_registro" placeholder="Ingrese su Contraseña">
							        <div class="invalid-feedback">
								    	<p id="contraseña_registro-invalid" class="m-0"></p>
								    </div>
								    <div class="valid-feedback">
								    	<p id="contraseña_registro-valid" class="m-0">Correcto</p>
								    </div>
							     </div>
					          </div>
					          <div class="form-group">
					            <label for="nacionalidad_registro" class="col-form-label"><strong>Nacionalidad</strong></label>
					            <div class="input-group mb-2">
							        <div class="input-group-prepend">
							          <div class="input-group-text"><span data-icon="h"></span></div>
							        </div>
							        <select class="form-control" id="nacionalidad_registro" name="nacionalidad_registro">
										<option value="AF">Afganistán</option>
										<option value="AL">Albania</option>
										<option value="DE">Alemania</option>
										<option value="AD">Andorra</option>
										<option value="AO">Angola</option>
										<option value="AI">Anguilla</option>
										<option value="AQ">Antártida</option>
										<option value="AG">Antigua y Barbuda</option>
										<option value="AN">Antillas Holandesas</option>
										<option value="SA">Arabia Saudí</option>
										<option value="DZ">Argelia</option>
										<option value="AR">Argentina</option>
										<option value="AM">Armenia</option>
										<option value="AW">Aruba</option>
										<option value="AU">Australia</option>
										<option value="AT">Austria</option>
										<option value="AZ">Azerbaiyán</option>
										<option value="BS">Bahamas</option>
										<option value="BH">Bahrein</option>
										<option value="BD">Bangladesh</option>
										<option value="BB">Barbados</option>
										<option value="BE">Bélgica</option>
										<option value="BZ">Belice</option>
										<option value="BJ">Benin</option>
										<option value="BM">Bermudas</option>
										<option value="BY">Bielorrusia</option>
										<option value="MM">Birmania</option>
										<option value="BO">Bolivia</option>
										<option value="BA">Bosnia y Herzegovina</option>
										<option value="BW">Botswana</option>
										<option value="BR">Brasil</option>
										<option value="BN">Brunei</option>
										<option value="BG">Bulgaria</option>
										<option value="BF">Burkina Faso</option>
										<option value="BI">Burundi</option>
										<option value="BT">Bután</option>
										<option value="CV">Cabo Verde</option>
										<option value="KH">Camboya</option>
										<option value="CM">Camerún</option>
										<option value="CA">Canadá</option>
										<option value="TD">Chad</option>
										<option value="CL" selected>Chile</option>
										<option value="CN">China</option>
										<option value="CY">Chipre</option>
										<option value="VA">Ciudad del Vaticano (Santa Sede)</option>
										<option value="CO">Colombia</option>
										<option value="KM">Comores</option>
										<option value="CG">Congo</option>
										<option value="CD">Congo, República Democrática del</option>
										<option value="KR">Corea</option>
										<option value="KP">Corea del Norte</option>
										<option value="CI">Costa de Marfíl</option>
										<option value="CR">Costa Rica</option>
										<option value="HR">Croacia (Hrvatska)</option>
										<option value="CU">Cuba</option>
										<option value="DK">Dinamarca</option>
										<option value="DJ">Djibouti</option>
										<option value="DM">Dominica</option>
										<option value="EC">Ecuador</option>
										<option value="EG">Egipto</option>
										<option value="SV">El Salvador</option>
										<option value="AE">Emiratos Árabes Unidos</option>
										<option value="ER">Eritrea</option>
										<option value="SI">Eslovenia</option>
										<option value="ES">España</option>
										<option value="US">Estados Unidos</option>
										<option value="EE">Estonia</option>
										<option value="ET">Etiopía</option>
										<option value="FJ">Fiji</option>
										<option value="PH">Filipinas</option>
										<option value="FI">Finlandia</option>
										<option value="FR">Francia</option>
										<option value="GA">Gabón</option>
										<option value="GM">Gambia</option>
										<option value="GE">Georgia</option>
										<option value="GH">Ghana</option>
										<option value="GI">Gibraltar</option>
										<option value="GD">Granada</option>
										<option value="GR">Grecia</option>
										<option value="GL">Groenlandia</option>
										<option value="GP">Guadalupe</option>
										<option value="GU">Guam</option>
										<option value="GT">Guatemala</option>
										<option value="GY">Guayana</option>
										<option value="GF">Guayana Francesa</option>
										<option value="GN">Guinea</option>
										<option value="GQ">Guinea Ecuatorial</option>
										<option value="GW">Guinea-Bissau</option>
										<option value="HT">Haití</option>
										<option value="HN">Honduras</option>
										<option value="HU">Hungría</option>
										<option value="IN">India</option>
										<option value="ID">Indonesia</option>
										<option value="IQ">Irak</option>
										<option value="IR">Irán</option>
										<option value="IE">Irlanda</option>
										<option value="BV">Isla Bouvet</option>
										<option value="CX">Isla de Christmas</option>
										<option value="IS">Islandia</option>
										<option value="KY">Islas Caimán</option>
										<option value="CK">Islas Cook</option>
										<option value="CC">Islas de Cocos o Keeling</option>
										<option value="FO">Islas Faroe</option>
										<option value="HM">Islas Heard y McDonald</option>
										<option value="FK">Islas Malvinas</option>
										<option value="MP">Islas Marianas del Norte</option>
										<option value="MH">Islas Marshall</option>
										<option value="UM">Islas menores de Estados Unidos</option>
										<option value="PW">Islas Palau</option>
										<option value="SB">Islas Salomón</option>
										<option value="SJ">Islas Svalbard y Jan Mayen</option>
										<option value="TK">Islas Tokelau</option>
										<option value="TC">Islas Turks y Caicos</option>
										<option value="VI">Islas Vírgenes (EEUU)</option>
										<option value="VG">Islas Vírgenes (Reino Unido)</option>
										<option value="WF">Islas Wallis y Futuna</option>
										<option value="IL">Israel</option>
										<option value="IT">Italia</option>
										<option value="JM">Jamaica</option>
										<option value="JP">Japón</option>
										<option value="JO">Jordania</option>
										<option value="KZ">Kazajistán</option>
										<option value="KE">Kenia</option>
										<option value="KG">Kirguizistán</option>
										<option value="KI">Kiribati</option>
										<option value="KW">Kuwait</option>
										<option value="LA">Laos</option>
										<option value="LS">Lesotho</option>
										<option value="LV">Letonia</option>
										<option value="LB">Líbano</option>
										<option value="LR">Liberia</option>
										<option value="LY">Libia</option>
										<option value="LI">Liechtenstein</option>
										<option value="LT">Lituania</option>
										<option value="LU">Luxemburgo</option>
										<option value="MK">Macedonia, Ex-República Yugoslava de</option>
										<option value="MG">Madagascar</option>
										<option value="MY">Malasia</option>
										<option value="MW">Malawi</option>
										<option value="MV">Maldivas</option>
										<option value="ML">Malí</option>
										<option value="MT">Malta</option>
										<option value="MA">Marruecos</option>
										<option value="MQ">Martinica</option>
										<option value="MU">Mauricio</option>
										<option value="MR">Mauritania</option>
										<option value="YT">Mayotte</option>
										<option value="MX">México</option>
										<option value="FM">Micronesia</option>
										<option value="MD">Moldavia</option>
										<option value="MC">Mónaco</option>
										<option value="MN">Mongolia</option>
										<option value="MS">Montserrat</option>
										<option value="MZ">Mozambique</option>
										<option value="NA">Namibia</option>
										<option value="NR">Nauru</option>
										<option value="NP">Nepal</option>
										<option value="NI">Nicaragua</option>
										<option value="NE">Níger</option>
										<option value="NG">Nigeria</option>
										<option value="NU">Niue</option>
										<option value="NF">Norfolk</option>
										<option value="NO">Noruega</option>
										<option value="NC">Nueva Caledonia</option>
										<option value="NZ">Nueva Zelanda</option>
										<option value="OM">Omán</option>
										<option value="NL">Países Bajos</option>
										<option value="PA">Panamá</option>
										<option value="PG">Papúa Nueva Guinea</option>
										<option value="PK">Paquistán</option>
										<option value="PY">Paraguay</option>
										<option value="PE">Perú</option>
										<option value="PN">Pitcairn</option>
										<option value="PF">Polinesia Francesa</option>
										<option value="PL">Polonia</option>
										<option value="PT">Portugal</option>
										<option value="PR">Puerto Rico</option>
										<option value="QA">Qatar</option>
										<option value="UK">Reino Unido</option>
										<option value="CF">República Centroafricana</option>
										<option value="CZ">República Checa</option>
										<option value="ZA">República de Sudáfrica</option>
										<option value="DO">República Dominicana</option>
										<option value="SK">República Eslovaca</option>
										<option value="RE">Reunión</option>
										<option value="RW">Ruanda</option>
										<option value="RO">Rumania</option>
										<option value="RU">Rusia</option>
										<option value="EH">Sahara Occidental</option>
										<option value="KN">Saint Kitts y Nevis</option>
										<option value="WS">Samoa</option>
										<option value="AS">Samoa Americana</option>
										<option value="SM">San Marino</option>
										<option value="VC">San Vicente y Granadinas</option>
										<option value="SH">Santa Helena</option>
										<option value="LC">Santa Lucía</option>
										<option value="ST">Santo Tomé y Príncipe</option>
										<option value="SN">Senegal</option>
										<option value="SC">Seychelles</option>
										<option value="SL">Sierra Leona</option>
										<option value="SG">Singapur</option>
										<option value="SY">Siria</option>
										<option value="SO">Somalia</option>
										<option value="LK">Sri Lanka</option>
										<option value="PM">St Pierre y Miquelon</option>
										<option value="SZ">Suazilandia</option>
										<option value="SD">Sudán</option>
										<option value="SE">Suecia</option>
										<option value="CH">Suiza</option>
										<option value="SR">Surinam</option>
										<option value="TH">Tailandia</option>
										<option value="TW">Taiwán</option>
										<option value="TZ">Tanzania</option>
										<option value="TJ">Tayikistán</option>
										<option value="TF">Territorios franceses del Sur</option>
										<option value="TP">Timor Oriental</option>
										<option value="TG">Togo</option>
										<option value="TO">Tonga</option>
										<option value="TT">Trinidad y Tobago</option>
										<option value="TN">Túnez</option>
										<option value="TM">Turkmenistán</option>
										<option value="TR">Turquía</option>
										<option value="TV">Tuvalu</option>
										<option value="UA">Ucrania</option>
										<option value="UG">Uganda</option>
										<option value="UY">Uruguay</option>
										<option value="UZ">Uzbekistán</option>
										<option value="VU">Vanuatu</option>
										<option value="VE">Venezuela</option>
										<option value="VN">Vietnam</option>
										<option value="YE">Yemen</option>
										<option value="YU">Yugoslavia</option>
										<option value="ZM">Zambia</option>
										<option value="ZW">Zimbabue</option>
								    </select>
							     </div>
					          </div>
					          <div class="form-group">
					          	<label for="foto_registro" class="col-form-label"><strong>Foto de Perfil</strong></label>
						          <div class="input-group mb-2">
									  <div class="input-group-prepend">
									    <span class="input-group-text" id="inputGroupFileAddon01" data-icon="f"></span>
									  </div>
									  <div class="custom-file">
									    <input type="file" class="custom-file-input" id="foto_registro" aria-describedby="inputGroupFileAddon01" name="foto_registro">
									    <label class="custom-file-label" for="foto_registro"></label>
									  </div>
									</div>
					         </div>
					          <input type="submit" class="btn btn-primary btn-block mt-4" value="Registrarse" name="Registrarse">
					        </form>
				        </div>
			        </div>
			      </div>
			      <div class="modal-footer">
			      	<div class="container">
						<div class="col-12 text-right mr-0">
							¿Ya tienes una cuenta registrada? | <strong><a href="#Modal" data-dismiss="modal" data-toggle="modal">Ingresar</a></strong>
						</div>
			        </div>
			      </div>
			    </div>
			  </div>
			</div>
		<!--FIN HEADER!-->
		</header>