<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<meta name="Description" content="Information architecture, Web Design, Web Standards." />
<meta name="Keywords" content="your, keywords" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Distribution" content="Global" />
<meta name="Author" content="Erwin Aligam - ealigam@gmail.com" />
<meta name="Robots" content="index,follow" />

<link rel="stylesheet" href="../../images/Enlighten.css" type="text/css" />

    <!-- blueprint CSS framework -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
	
</head>

<body>

<!-- wrap starts here -->
<div id="wrap">

	<div id="header">		
		
		<div id="logo-box">		
			<h1 id="logo"><a href="main.php" title="">enlighten</a></h1>
			<h2 id="slogan">Put your site slogan here...</h2>		
		</div>				
				
		<div class="headerphoto"></div>
	
	</div>
	
	<div id="menu">
            <?php $this->widget('zii.widgets.CMenu',array(
            'items'=>array(
            array('label'=>'Home', 'url'=>array('/site/index'), 'visible'=>!Yii::app()->user->isGuest),
            array('label'=>'Members', 'url'=>array('/member', 'view'=>'about'), 'visible'=>!Yii::app()->user->isGuest),
            array('label'=>'Assemblies', 'url'=>array('/assembly'), 'visible'=>!Yii::app()->user->isGuest),
            array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
            array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
            )); ?>
        </div><!-- mainmenu -->

	</div>
				
	<!-- content-wrap starts here -->
	<div id="content-wrap"><div id="content">				
		
		<!-- sidebar starts here -->
		<div id="sidebar" >
		
			<div class="sidebox">
			
				<h1>Short About</h1>
				
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum. 
				Cras id urna. Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu 
				posuere nunc justo tempus leo.</p>	
						
			</div>			

			<div class="sidebox">	
			
				<h1 class="clear">Sidebar Menu</h1>
				<ul class="sidemenu">
					<li><a href="main.php" class="top">Home</a></li>
					<li><a href="#TemplateInfo">Template Info</a></li>
					<li><a href="#SampleTags">Sample Tags</a></li>
					<li><a href="http://www.styleshout.com/">More Templates</a></li>
					<li><a href="http://www.dreamtemplate.com" title="Web Templates">Web Templates</a></li>
				</ul>	
				
			</div>	
			
			<div class="sidebox">	

				<h1>Sponsors</h1>
				<ul class="sidemenu">
                    <li><a href="http://www.dreamtemplate.com" title="Website Templates"  class="top">DreamTemplate</a></li>
                    <li><a href="http://www.themelayouts.com" title="WordPress Themes">ThemeLayouts</a></li>
                    <li><a href="http://www.imhosted.com" title="Website Hosting">ImHosted.com</a></li>
                    <li><a href="http://www.dreamstock.com" title="Stock Photos">DreamStock</a></li>
                    <li><a href="http://www.evrsoft.com" title="Website Builder">Evrsoft</a></li>
                    <li><a href="http://www.webhostingwp.com" title="Web Hosting">Web Hosting</a></li>
				</ul>
				
			</div>
			
			<div class="sidebox">	
			
				<h1>Wise Words</h1>
				<p>&quot;If my life is fruitless, it does not matter who 
				praises me, and if my life is fruitful, it does not 
				matter who criticizes me.&quot;</p>					
				<p class="align-right">- John Bunyan</p>
					
			</div>		
			
			<div class="sidebox">
			
				<h1>Support Styleshout</h1>
				<p>If you are interested in supporting my work and would like to contribute, you are
				welcome to make a small donation through the 
				<a href="http://www.styleshout.com/">donate link</a> on my website - it will 
				be a great help and will surely be appreciated.</p>	
				
			</div>
			
			<div class="sidebox">	
						
				<h1>Search Box</h1>	
				<form action="#" class="searchform">
					<p>
					<input name="search_query" class="textbox" type="text" />
  					<input name="search" class="button" value="Search" type="submit" />
					</p>			
				</form>			
				
			</div>
					
		</div>	
	
		<!-- main starts here -->
		<div id="main">		
		
			<div class="post">
			
				<a name="TemplateInfo"></a>
				<h1>Template Info</h1>
				
				<p>Posted by <a href="main.php">ealigam</a></p>

                <p><strong>Enlighten</strong> is a free, W3C-compliant, CSS-based website template
                by <a href="http://www.styleshout.com/">styleshout.com</a>. This work is
                distributed under the <a rel="license" href="http://creativecommons.org/licenses/by/2.5/">
                Creative Commons Attribution 2.5  License</a>, which means that you are free to
                use and modify it for any purpose. All I ask is that you give me credit by including a <strong>link back</strong> to
                <a href="http://www.styleshout.com/">my website</a>.
                </p>

                <p>
                You can find more of my free template designs at <a href="http://www.styleshout.com/">my website</a>.
                For premium commercial designs, you can check out
                <a href="http://www.dreamtemplate.com" title="Website Templates">DreamTemplate.com</a>.
                </p>
				
				<p class="post-footer align-right">					
					<a href="main.php" class="readmore">Read more</a>
					<a href="main.php" class="comments">Comments (7)</a>
					<span class="date">Jan 09, 2007</span>	
				</p>
				
			</div>
			
				<a name="SampleTags"></a>
				<h1>Sample Tags</h1>
				
				<h3>Code</h3>				
				<p><code>
				code-sample { <br />
				font-weight: bold;<br />
				font-style: italic;<br />				
				}
				</code></p>	
			
				<h3>Example Lists</h3>
			
				<ol>
					<li>here is an example</li>
					<li>of an ordered list</li>							
				</ol>	
						
				<ul>					
					<li>here is an example</li>
					<li>of an unordered list</li>							
				</ul>				
				
				<h3>Blockquote</h3>			
				<blockquote><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy 
				nibh euismod tincidunt ut laoreet dolore magna aliquam erat....</p></blockquote>
			
				<h3>Image and text</h3>
				<p>
				<a href="http://getfirefox.com/"><img src="../../images/firefox-gray.jpg" width="100" height="121" alt="firefox-gray"  class="float-left" /></a>
				Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum. 
				Cras id urna. Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu 
				posuere nunc justo tempus leo. Donec mattis, purus nec placerat bibendum, dui pede condimentum 
				odio, ac blandit ante orci ut diam. Cras fringilla magna. Phasellus suscipit, leo a pharetra 
				condimentum, lorem tellus eleifend magna, eget fringilla velit magna id neque. Curabitur vel urna. 
				In tristique orci porttitor ipsum. Aliquam ornare diam iaculis nibh. Proin luctus, velit pulvinar 
				ullamcorper nonummy, mauris enim eleifend urna, congue egestas elit lectus eu est. 								
				</p>
				
				<h3>Table Styling</h3>							
			
				<table>
					<tr>
						<th class="first"><strong>post</strong> date</th>
						<th>title</th>
						<th>description</th>
					</tr>
					<tr class="row-a">
						<td class="first">06.18.2007</td>
						<td><a href="main.php">Augue non nibh</a></td>
						<td><a href="main.php">Lobortis commodo metus vestibulum</a></td>
					</tr>
					<tr class="row-b">
						<td class="first">06.18.2007</td>
						<td><a href="main.php">Fusce ut diam bibendum</a></td>
						<td><a href="main.php">Purus in eget odio in sapien</a></td>
					</tr>
					<tr class="row-a">
						<td class="first">06.18.2007</td>
						<td><a href="main.php">Maecenas et ipsum</a></td>
						<td><a href="main.php">Adipiscing blandit quisque eros</a></td>
					</tr>
					<tr class="row-b">
						<td class="first">06.18.2007</td>
						<td><a href="main.php">Sed vestibulum blandit</a></td>
						<td><a href="main.php">Cras lobortis commodo metus lorem</a></td>
					</tr>
				</table>
			
				<h3>Example Form</h3>
				<form action="#">			
					<p>			
					<label>Name</label>
					<input name="dname" value="Your Name" type="text" size="30" />
					<label>Email</label>
					<input name="demail" value="Your Email" type="text" size="30" />
					<label>Your Comments</label>
					<textarea rows="5" cols="5"></textarea>
					<br />	
					<input class="button" type="submit" />		
					</p>		
				</form>				
				
				<br />	
							
		<!-- main ends here -->								
		</div>				
				
	<!-- content-wrap ends here -->		
	</div></div>

	<div id="footer">
	    <p>
	    &copy; 2010 Your Company |
        <a href="http://www.bluewebtemplates.com/" title="Website Templates">website templates</a> by <a href="http://www.styleshout.com/">styleshout</a> |
	    Valid <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> |
		      <a href="http://validator.w3.org/check/referer">XHTML</a>
	    </p>
	</div>
	
<!-- wrap ends here -->
</div>

</body>
</html>
