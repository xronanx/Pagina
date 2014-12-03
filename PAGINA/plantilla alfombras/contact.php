<?php
    require('libreria/motor.php');
	

    if(isset($_POST['boton'])){
        if($_POST['nombre'] == ''){
            $error1 = '<span class="error">Ingrese su nombre</span>';
        }else if($_POST['apellido'] == ''){
            $error2 = '<span class="error">Ingrese su Apellido</span>';
        }else if($_POST['direccion'] == ''){
            $error3 = '<span class="error">Ingrese su Direccion</span>';
        }else if($_POST['telefono'] == ''){
            $error4 = '<span class="error">Ingrese su Telefono</span>';
        }else if($_POST['email'] == '' or !preg_match("/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/",$_POST['email'])){
            $error5 = '<span class="error">Ingrese un email correcto</span>';
        
        }else if($_POST['mensaje'] == ''){
            $error7 = '<span class="error">Ingrese un mensaje</span>';
        }else{
            $from = "From: ".$_POST['email']; 
            $mail = "clientes.alfinte@gmail.com";
			$subject = "El Cliente ".$_POST["nombre"]." Consulta la Siguiente Informacion";
            $message = $_POST["mensaje"];
			
			mail($mail,$subject,$message,$from);            
            
           /**********************************************************************/

           /* Lo utilizare despues
           if(mail($dest,$asunto,$cuerpo,$headers)){
 
                foreach($_POST AS $key => $value) {
                    $_POST[$key] = mysql_real_escape_string($value);
                }*/

             /**********************************************************************/
                 if(1==1){
                           $cit=new cita();
                           $id_cita=$cit->secqnos();
                           $cit->id_cita=$id_cita;
                           $cit->fecha_creacion=date("Y-m-d H:i:s");
                           $cit->fecha_programada="";
                           $cit->hora="";
                           $cit->nombre=$_POST['nombre'];
                           $cit->apellido=$_POST['apellido'];
                           $cit->telefono=$_POST['telefono'];
                           $cit->direccion=$_POST['direccion'];
                           $cit->email=$_POST['email'];
                           $cit->id_canal=1;
                           $cit->id_estado=1;
                           $cit->comentario=$_POST['mensaje'];
						   $cit->id_empleado=4;

                           $result=$cit->agregar();
                           if($result>0){
                              $result = '<div class="result_ok">Mensaje Enviado Satisfactoriamente </div>';
							 $contacto = "Su Numero de Cita es ".$id_cita." En Breve se comunicara uno de nuestros vendedores para arreglar una cita";
							 mail($_POST['email'],"Comprobante de Contacto",$contacto,$from);
                               $cit->Upsecqnos();
                           }else{
                              $result = '<div class="result_fail">Hubo un error al enviar el mensaje <img src="http://web.tursos.com/wp-includes/images/smilies/icon_sad.gif" alt=":(" class="wp-smiley"> </div>';
                           }

               // $sql = "INSERT INTO `cf` (`nombre`,`email`,`asunto`,`mensaje`) VALUES ('{$_POST['nombre']}','{$_POST['email']}','{$_POST['asunto']}','{$_POST['mensaje']}')";
               // mysql_query($sql) or die(mysql_error());
 

                // si el envio fue exitoso reseteamos lo que el usuario escribio:
                $_POST['nombre'] = '';
                $_POST['email'] = '';
                
                $_POST['mensaje'] = '';
				$_POST['apellido'] = '';
                $_POST['direccion'] = '';
                $_POST['telefono'] = '';
            }else{
                $result = '<div class="result_fail">Hubo un error al enviar el mensaje <img src="http://web.tursos.com/wp-includes/images/smilies/icon_sad.gif" alt=":(" class="wp-smiley"> </div>';
            }
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contacto</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/layout.css" type="text/css" media="screen"> 
    <script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
    <script src="js/cufon-yui.js" type="text/javascript"></script>
    <script src="js/cufon-replace.js" type="text/javascript"></script> 
    <script src="js/Dynalight_400.font.js" type="text/javascript"></script>
    <script src="js/FF-cash.js" type="text/javascript"></script>  
	<!--[if lt IE 8]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
        	<img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
    </div>
	<![endif]-->
    <!--[if lt IE 9]>
   		<script type="text/javascript" src="js/html5.js"></script>
	<![endif]-->
</head>
<body id="page6">
	<!--==============================header=================================-->
    <header>
    	<div class="row-top">
        	<div class="main">
            	<div class="wrapper">
                	<h1><a href="../index.html"><img src="../Captura.PNG" width="218" height="141"><span>Alfinte S.</span><span>A de C.V.</span></a>                    </h1>
                	<nav>
                      <ul class="menu">
                            
                        <li><a href="../index.html">Inicio</a></li>
                            <li><a href="../catalogue.html">Cortinas </a></li>
                            <li><a href="catalogue.html">Alfombras</a></li>
                            <li><a href="../plantilla puertas/catalogue.html">Puertas </a></li>
                            <li><a class="active" href="contact.php">Contacto</a></li>
                      </ul>
                  </nav>
                </div>
            </div>
        </div>
        <div class="row-bot">
        	<div class="row-bot-bg">
            	<div class="main">
                	<h2>Contactenos. <span>Es un gusto atenderle</span></h2>
                </div>
            </div>
        </div>
    </header>
    
	<!--==============================content================================-->
    <section id="content"><div class="ic"></div>
        <div class="main">
            <div class="wrapper">
            	<article class="col-1">
                	<div class="indent-left">
                    	<h3 class="p1">Nuestra Ubicacion</h3>
                        <figure class="indent-bot">
                            <iframe width="240" height="180" src="https://www.google.com/maps/search/Calle+Gabriela+Mistral,+San+Salvador,+El+Salvador/@13.7096627,-89.2090474,17z/data=!3m1!4b1!4m5!2m4!3m3!1sCalle+Gabriela+Mistral,+San+Salvador,+El+Salvador!2sCalle+Gabriela+Mistral,+San+Salvador,+El+Salvador!3s0x8f63306245dd937b:0xbb1dcb26351a000f?hl=es"></iframe>
                        </figure>
                        <dl>
                            <dt class="p1">Urb. Buenos Aires III , Calle Gabriela Mistral #560,
San Salvador, El Salvador , C.A.</dt>
                            <dd><span>Teléfono:</span>  (503) 2235-0138</dd>
                            <dd><span>Operador:</span>  (503) 2235-0146 </dd>
                            <dd><span>Fax:</span>  (503) 2225-1519</dd>
                            <dd><span>Email:</span><a class="color-2" href="#"> 
info@alfinte.com</a></dd>
                        </dl>
                    </div>
                </article>
                <article class="col-2">
                	<h3 class="p1">Contacto </h3>
                    <form id="contact-form" class='contacto' method="post" enctype="multipart/form-data">                    
                        <fieldset>
                              <label><span class="text-form">Nombre:</span><input type='text' 	class='nombre' name='nombre' value='<?php if(isset($_POST['nombre'])){ echo $_POST['nombre']; } ?>'><?php if(isset($errors)){ echo $errors[1]; } ?></label>
                              <label><span class="text-form">Apellido:</span><input type='text' class='apellido' name='apellido' value='<?php if(isset($_POST['apellido'])){ echo $_POST['apellido']; } ?>'><?php if(isset($errors)){ echo $errors[2]; } ?></label>
							  <label><span class="text-form">Direccion:</span><input type='text'class='direccion' name='direccion' value='<?php if(isset($_POST['direccion'])){ echo $_POST['direccion']; } ?>'><?php if(isset($errors)){ echo $errors[3]; } ?></label>
							  <label><span class="text-form">Telefono:</span><input type='text' class='telefono' name='telefono' value='<?php if(isset($_POST['telefono'])){ echo $_POST['telefono']; } ?>'><?php if(isset($errors)){ echo $errors[4]; } ?></label>
							  <label><span class="text-form">Email:</span><input type='text' 	class='email' name='email' value='<?php if(isset($_POST['email'])){ $_POST['email']; } ?>'><?php if(isset($errors)){ echo $errors[5]; } ?></label>
                              
                              <div class="wrapper">
                                <div class="text-form">Comentario:</div>
                                <div class="extra-wrap">
                                    <textarea rows='6' class='mensaje' name='mensaje'><?php if(isset($_POST['mensaje'])){ $_POST['mensaje']; } ?></textarea><?php if(isset($errors)){ echo $errors[7]; } ?>
                                    <div class="clear"></div>
                                    <div><input type='submit' value='Envia Mensaje' class='boton' name='boton'></div>
            <?php if(isset($result)) { echo $result; }


			?>
                                </div>
                              </div>                            
                        </fieldset>						
                    </form>
                </article>
            </div>
        </div>
    </section>
    
	<!--==============================footer=================================-->
    <footer>
        <div class="main">
        	<div class="aligncenter">
            	<span>Alfinte S.A. de C.V.</span>
              Todos los derechos reservados
            </div>
        </div>
    </footer>
    <script type="text/javascript"> Cufon.now(); </script>
</body>
</html>
