<?php
$siteDescription = __d('cake_dev', 'Technical Session - genweb2');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $siteDescription ?>:
            <?php echo $this->fetch('title'); ?>
        </title>
        <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css('app');
        echo $this->Html->css('signin');
        echo $this->Html->script('../lib/jquery/dist/jquery.min.js');
        echo $this->Html->script('../lib/bootstrap-sass-official/assets/javascripts/bootstrap.js');
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>
    <body>  
        <div class="container">            

            <div class="row">
                <div class="col-md-12 text-center">
                    <?php
                    echo $this->Html->link(
                            $this->Html->image('top-logo.png', array('alt' => 'Genweb2 Technical Session', 'border' => '0')), '/', array('escape' => false, 'id' => 'cake-powered')
                    );
                    ?>
                    <?php echo $this->fetch('content'); ?>
                </div>                
            </div> 
            <div class="form-signin">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <?php echo $this->Session->flash(); ?>
                    </div>                
                </div>  
            </div>  

        </div>
    </body>
</html>
