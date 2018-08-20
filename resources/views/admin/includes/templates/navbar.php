<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app_nav" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../adminIndex">
	    <i class="fa fa-home fa-lg"></i>
	    <?php echo lang("home"); ?>
	  </a>
    </div>
    <div class="collapse navbar-collapse myNave" id="app_nav">
      <ul class="nav navbar-nav">
        <li><a href="categories.php"><?php echo lang("cat"); ?></a></li>
        <li><a href="products.php"><?php echo lang("product"); ?></a></li>
        <li><a href="members.php"><?php echo lang("member"); ?></a></li>
        <li><a href="types.php"><?php echo lang("type"); ?></a></li>
		<li><a href="#"><?php echo lang("statis"); ?></a></li>
		<li><a href="comments.php"><?php echo lang("comment"); ?></a></li>
		<li><a href="offers.php"><?php echo "Offers"; ?></a></li>
        <li><a href="#"><?phpecho lang("logs");?></a></li>
		<!--<li>
		<div class="btn-group pull-right mylang">
		      <span class="btn btn-default btn-dropdown-toggle" data-toggle="dropdown">
			    Languag
				<span class="caret"></span>
			  </span>
				<ul class="dropdown-menu mylang">
				  <li><a href="inti.php?lg=en">English</a></li>
				  <li><a href="inti.php?lg=ar">Arabic</a></li>
				   
				</ul>
		   </div>
		</li>
		-->
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">user <span class="caret"></span></a>
          <ul class="dropdown-menu">
		    <li><a href="../index.php"><?php echo lang("shop"); ?></a></li>
            <li><a href="#"><?php echo lang("edit"); ?></a></li>
            <li><a href="#"><?php echo lang("sitting"); ?></a></li>
 
            <li><a href="logout.php"><?php echo lang("logout"); ?></a></li>
          </ul>
        </li>
      </ul>
	  <img src="../images/8.jpg" class="img-thumbnail img-circle pull-right">
    </div> 
  </div> 
</nav>