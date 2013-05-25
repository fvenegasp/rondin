<?php
$cakeDescription = __d('cake_dev', 'Demo');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <?php echo $this->Html->charset(); ?>
            <title>
                <?php echo $cakeDescription ?>:
                <?php echo $title_for_layout; ?>
            </title>

            <?php
            // DA favicon
            echo $this->Html->meta('icon');

            // DA CSS
            echo $this->Html->css('bootstrap');
            echo $this->Html->css('bootstrap-responsive');
          // echo $this->Html->css('flat-ui');
            echo $this->Html->css('jquery-ui');

            // DA JS
            echo $this->Html->script('jquery-1.8.3');
            echo $this->Html->script('bootstrap.min');
            echo $this->Html->script('home');
            echo $this->Html->script('jquery-ui');

            echo $this->fetch('meta');
            echo $this->fetch('css');
            echo $this->fetch('script');
            ?>

            <script type="text/javascript" language="javascript">
                var logout = "<?php echo $this->Html->url(array("controller" => "home", "action" => "logout")); ?>";
            </script>
    </head>
    <body>
        
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <?php //echo $this->Html->link('i-med', '/', array('class' => 'brand')); ?>

                    <div class="nav-collapse">
                        <ul class="nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    Usuarios
                                    <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><?php echo $this->Html->link('Administracion ', '/administracion', array()); ?></li>


                                </ul>
                            </li>



                        </ul>
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <!-- Datos de Sesion -->
                                    <?php
                                    // echo $this->TwitterBootstrap->icon("user", "white") . "     ";
                                    echo $this->Session->read('Users.nombre') . " " . $this->Session->read('Users.ap_paterno') . " " . $this->Session->read('Users.ap_materno');
                                    ?>  <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                   <!--<li class="disabled"><a href="#"><i class="icon-cog"></i> Ver perfil</a></li>-->
                                    <li><?php echo " Rut:" . $this->Session->read('Users.rut'); ?> </li>

                                </ul>
                            </li> 
                            <li><a id="cerrar_sesion" href="#"><i class="icon-off"></i> Cerrar Sesión</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->

                </div>
            </div>
        </div> <!-- fin barra -->
        <div id="contenido">
            <div id="content">
                <br><br><br>
                <?php /*
                  function generaXMLArbol($data,$padre,$rang) {
                  foreach($data as $dat){
                  if ($dat['Recursos']['id_padre']==$padre ) {
                  echo '<row id="'.$dat['Recursos']['id_recurso'].'" open="1">';
                  echo'</row>';
                  }
                  }
                  /*for($x=0;$x<count($data);$x++) {
                  if ($data[$x][1]==$padre ) {
                  echo '<row id="'.$data[$x][0].'" open="1">';
                  $img = icon($data, $data[$x][0]);

                  for ($i = 0; $i <= (count($data[$x]) - 1); $i++)
                  echo '<cell image="'.$img.'" > '.$data[$x][$i].'</cell>';

                  generaXMLArbol($data,$data[$x][0],$rang+1);
                  echo'</row>';
                  }
                  }
                  }

                  generaXMLArbol($this->Session->read('Users.menu'),0,0);

                  foreach ($this->Session->read('Users.menu') as $data){
                  echo "<br>".$data['Recursos']['id_recurso']."-".$data['Recursos']['id_padre'];
                  }
                  echo "<br><br>";
                  print_r($this->Session->read('Users.menu')); */ ?>
                <?php echo $this->fetch('content'); ?>
            </div>
            <!-- content -->
        </div> <!-- el contenido -->
    </body>

</html>
