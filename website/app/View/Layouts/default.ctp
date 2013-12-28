<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo $title_for_layout ?></title>
  <?php if (isset($meta_description)) : ?>
    <meta name="description" content="<?php echo $meta_description ?>">
  <?php endif; ?>

  <?php 
  echo $this->Html->meta('icon');
  echo $this->Html->css('styles');
  echo $this->Html->script('deepkanwal.js');
  ?>

  <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
<!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'> -->


  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <!-- Google Analytics -->
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-43087523-1');
  ga('send', 'pageview');
  </script>
  <!-- End Google Analytics -->
</head>

<body>
  <div id="container">
    <header>
      <h1> <?php echo $this->Html->link('Deepkanwal Plaha', array('controller' => 'projects', 'action' => 'index')) ?> </h1>
      <nav>
        <ul>
          <li> <?php echo $this->Html->link('Projects', array('controller' => 'projects', 'action' => 'index')); ?> </li>
          <li> <?php echo $this->Html->link('Journal', array('controller' => 'journals', 'action' => 'index')); ?> </li>
          <li> <?php echo $this->Html->link('About', array('controller' => 'pages', 'action' => 'about')); ?> </li>
        </ul>
      </nav>
    </header>

    <div id="content-container">
      <?php echo $this->fetch('content'); ?>
    </div>

    <footer>
      2013 © Deepkanwal Plaha
    </footer>
  </div>
</body>

</html>