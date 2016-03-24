<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <?php echo $this->Html->link('devBOM', '/parttypes/index', array('class' => 'navbar-brand'))?>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><?php echo $this->Html->link('Home', '/parttypes/index')?></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>