<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        
        <?= $this->fetch('title') ?>
    </title>
    <?php echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'); ?>
    <?php echo $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js'); ?>
    <?php echo $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'); ?>
    
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('bootstrap.css'); ?>
    <?= $this->Html->css('bootstrap.min.css'); ?>
    <?= $this->Html->css('bootstrap-grid.css'); ?>
    <?= $this->Html->css('bootstrap-grid.min.css'); ?>

    <?= $this->Html->css('register.css'); ?>
    
    <?php echo $this->Html->script('login.js'); ?>
     <?php echo $this->Html->script('bootstrap.min.js'); ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
   <nav class="top-nav">
        
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>

            <?= $this->fetch('content') ?>
        </div>
        <div>
    </main>
    <footer>
    </footer>
</body>
</html>
