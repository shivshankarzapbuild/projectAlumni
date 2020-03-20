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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>



    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('bootstrap.css'); ?>
    <?= $this->Html->css('bootstrap.min.css'); ?>
    <?= $this->Html->css('bootstrap-grid.css'); ?>
    <?= $this->Html->css('bootstrap-grid.min.css'); ?>
    <?= $this->Html->css('admin.css'); ?>

    <?php echo $this->Html->script('admin.js'); ?>
    <?php echo $this->Html->script('bootstrap.min.js'); ?>
    <?php echo $this->Html->script('bootstrap.js'); ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
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
