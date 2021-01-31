<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html dir='ltr' xmlns='http://www.w3.org/1999/xhtml'>
<head>
	<title><?php echo $cfg['site']['title']; ?></title>
	<meta http-equiv="Content-Type" content="Type=text/html; charset=utf-8" />
	<?php $this->renderSection('head');?>
</head>
<body>
<style>
#page-container {
  position: relative;
  min-height: 80vh;
}

#content-wrap {
  padding-bottom: 2.5rem;    /* Footer height */
}

#footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 2.5rem;            /* Footer height */
}

#copyright {
  text-align:center;
}
</style>
	<!-- Header -->
	<div id="header">
		<div class="content">
			<div style="width:100%;text-align:center" >
				<h1 style="font-size:30px;"><?php echo $cfg['site']['name']; ?></h1>
			</div>
		</div>
	</div>	
    	<!-- Main -->
        <div id="page-container">
            <div id="content-wrap">
                <div id="main">
                     <?php $this->renderBody();?>
                </div>
            </div>
            <!-- Footer -->
            <div id="footer">
                <div class="content">
                    <div id='copyright'>
                        <p>
                            <span>
                            Copyright &#169; <?php echo date('Y');?>
                            </span>
                        </p>
                    </div>			
                </div>
            </div>
        </div>	
    </body>
</html>