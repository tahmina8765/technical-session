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
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script>
            $(function () {
                $(".datepicker").datepicker({
                    showOtherMonths: true,
                    selectOtherMonths: true,
                    changeMonth: true,
                    changeYear: true,
                    dateFormat: "yy-mm-dd"

                });
            });
        </script>
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
            <?php echo $this->fetch('content'); ?>
            <?php
//            echo $this->Html->link(
//                    $this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')), 'http://www.cakephp.org/', array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
//            );
            ?>
        </div>
        <footer>
            <div class="container">
                <div class="row">
                    <p style="text-align: left;">Copyright &copy; <?php echo date('Y'); ?>                    
                        Genweb2 Ltd. - All Rights Reserved.</p>
                </div>
            </div>
        </footer>

    </body>
</html>
