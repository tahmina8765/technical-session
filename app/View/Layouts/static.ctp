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
        echo $this->Html->css('static');
        echo $this->Html->script('../lib/jquery/dist/jquery.min.js');
        echo $this->Html->script('../lib/bootstrap-sass-official/assets/javascripts/bootstrap.js');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>
    <body>
        <?php echo $this->element('top_nev'); ?>
        <!-- Static navbar -->
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <?php echo $this->Session->flash(); ?>
                </div>                
            </div>

            <?php
//            echo $this->Html->link(
//                    $this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')), 'http://www.cakephp.org/', array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
//            );
            ?>
        </div>
        <?php echo $this->fetch('content'); ?>
        <div class="container">
            <div class="row">
                <p style="text-align: left;">Copyright &copy; <?php echo date('Y'); ?>                    
                    Genweb2 Ltd. - All Rights Reserved.</p>
            </div>
        </div>
    </body>
</html>
