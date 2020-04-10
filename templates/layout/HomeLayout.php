<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        
        <?= $this->fetch('title') ?>
    </title>
    <?=  $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'); ?>
    <?=  $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js'); ?>
    <?=  $this->Html->script('https://code.jquery.com/ui/1.12.1/jquery-ui.js'); ?>
    <?=  $this->Html->script('https://code.jquery.com/jquery-1.12.4.js'); ?>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('bootstrap.css'); ?>
    <?= $this->Html->css('bootstrap.min.css'); ?>
    <?= $this->Html->css('bootstrap-grid.css'); ?>
    <?= $this->Html->css('bootstrap-grid.min.css'); ?>
    <?= $this->Html->css('homePage.css'); ?>

    <?= $this->Html->script('home.js'); ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
   <div class="container mt-3">



    <nav class="top-nav">
        
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>

            <?= $this->fetch('content') ?>
        </div>
        <div>

    </div>
    </main>
    <footer>
    </footer>
</body>
</html>
