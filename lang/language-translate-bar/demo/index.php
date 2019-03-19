<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="http://www.google.com/jsapi" type="text/javascript"></script>
<script type="text/javascript">
	google.load('jquery', '1.3.2');
</script>
<script type="text/javascript" src="js/jquery.translate-1.4.5.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css" media="all"/>

<title>Website Translate Bar</title>
</head>

<body>
	
	<div id="translateBar">
    	<!-- These are the flag images, give your flags a class of 'translate' and an ID of the flags country code -->
    	<img src="images/flags/gb.png" class="translate" id="en"/>
        <img src="images/flags/nl.png" class="translate" id="nl"/>
        <img src="images/flags/fr.png" class="translate" id="fr"/>
        <img src="images/flags/es.png" class="translate" id="es"/>
        <img src="images/flags/de.png" class="translate" id="de"/>
        <img src="images/flags/cn.png" class="translate" id="zh"/>
        <img src="images/flags/pl.png" class="translate" id="pl"/>
        <img src="images/flags/ru.png" class="translate" id="ru"/>
        <img src="images/flags/gr.png" class="translate" id="el"/>
        <img src="images/flags/it.png" class="translate" id="it"/>
        <img src="images/flags/jp.png" class="translate" id="ja"/>
    </div>
	
    <div id="notifier">
        <img src="images/loader.gif" />
    </div>
    
    <div id="sampleText">
    	<h1>Language Translator Bar</h1>
        
    	<p>Using this simple language translator bar harness the power of AJAX, jQuery and Google Translate so your websites visitors can 
        instantly translate your entire website to their native language with one mouse click and no page refresh!</p>
        
        <p>It's also super easy to install and configure! within 5 to 10 minutes you'll have a fully functional multi-lingual
         website available in 50+ languages! In fact the only configuration needed is deciding what languages you want your website 
         to be available in.</p>
        
        <p>If you get stuck with anything the comprehensive readme will walk you thru the installation process, 
        which also contains a full list of country codes supported by the Google Translator to get you adding countries super fast.</p>
		
    </div>
	
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
	$("#notifier").hide(); //On page load, hide the translation loader
	var Language = '<?php echo $_SESSION['language'] ?>'; // Set the Language variable from PHP
	
	$(".translate").click(function(){ // When something with the class of 'translate' is clicked trigger this function
		$("#notifier").slideDown(200); // Slide the notifer doing, so people know its working
		var Language = $(this).attr("id"); // Set the Language variable to the value of the clicked items ID
		$.ajax({ // Initialise Ajax call
			url:'ajax.php?status=updateLanguage', // Set the Ajax URL
			data:'language='+Language, // Send it the correct data
			type:'GET', // Set the data transfer type
			success:function(data){ // If successful..
				$("body").translate('en', data); // Translate the page from English to whatever langauge the Ajax page sent back
				$("#notifier").slideUp(600); // Slide the notifier back up
			}
		})
	});
	
	$("body").translate('en', Language); // Translate the page
	
});
</script>