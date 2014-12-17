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
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->fetch('content'); ?>
            <?php
//            echo $this->Html->link(
//                    $this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')), 'http://www.cakephp.org/', array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
//            );
            ?>
        </div>
    </body>
</html>
