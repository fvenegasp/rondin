<?php
$cakeDescription = __d('cake_dev', 'Login');
?>
<!DOCTYPE html>
<html  xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <?php echo $this->Html->charset(); ?>
            <title>
                <?php echo $cakeDescription ?>:
                <?php echo $title_for_layout; ?>
            </title>
            <?php
             
            
            echo $this->Html->meta('icon');

            // Estilos CSS
            echo $this->Html->css('bootstrap');
            echo $this->Html->css('flat-ui');
            echo $this->Html->css('window_loader');

            echo $this->Html->script(array('jquery-1.8.3','jquery.placeholder.min','jquery.Rut', 'login' ));
            
            echo $this->fetch('meta');
            echo $this->fetch('css');
            echo $this->fetch('script');

            echo $this->Js->writeBuffer(); // Write cached scripts 
            ?>


    </head>
    <body>
        <div class="container">
            <div class="alert " id="CajaMensajes" style="position: fixed; top: 1%; left: 15%; width: 70%;display: none ">            
                <button id="btnCerrar" type="button" class="close" data-dismiss="alert">&times;</button>            
                <p id="pMensaje" ></p>
            </div>
            <div class="demo-headline">
                <h1 class="demo-logo">
                    DEMO
                    <div class="logo"></div>
                </h1>
            </div> <!-- /demo-headline -->
            <div class="login">
                <div class="login-screen">
                    <div class="login-icon">
                      <!--  <img src="images/acepta.png" style='max-width: 200%;' alt="Login Libro de Clases" /> -->
                        <h4 style="margin-top: 30px;">Acceso <small>DEMO</small></h4>
                    </div>
                    
                    <div class="login-form">
                        
                        <div class="control-group">
                            <?php echo $this->fetch('content'); ?>
                        </div>     
                    </div>

                </div>
            </div>
        </div> <!-- /container -->
        <footer></footer>
    </body>
</html>