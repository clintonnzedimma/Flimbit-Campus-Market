<?php
include $_SERVER['DOCUMENT_ROOT'].'/new_flimbit/engine/env/ftf.php'; 
?>
<!DOCTYPE html>
<html>
<head>
	<title> <?php $_PAGE_TITLE = "Privacy Policy | Flimbit"; ?></title>
	<?php include 'includes/meta-main.php'; ?>
</head>
<body>
<?php include 'includes/header.php'; ?>
<style type="text/css">
section.rules {
  background: #fff;
  width: 75%;
  text-align: left;
  margin-top: 1%;
  padding: 6px;
  border: 1px solid #eaeaea;
  font-family: tahoma;
  color: #5a5f61;
  font-size: 14px;
  margin-bottom: 4%;
}
p.container {
  margin-bottom: 2%;
}

h2.over-head-topic {
  margin-top: 13%;	
  font-family: tahoma;
  color: #1f3145;
  font-weight: 100;
  padding-bottom: 6px;
}	

hr.center-block-1 {
  background: #324356;
  border: 0px solid #324356;
  height: 4px;
  width: 55px;
  margin-top: -10px;
  padding-top: -10px;
}

h4.topic {
  margin-top: 4px;
  margin-bottom: 4px;
  background: #f7f7f7;
  padding: 3px;
}

/*mobile*/
@media (max-width:600px)
{
h2.over-head-topic {
 margin-top: 25%;	
}


}	
</style>
<center>
	<h2 class="over-head-topic" align="center"> PRIVACY POLICY</h2>
	<hr class="center-block-1"></hr>	
	<section class="rules">		
		<p class="container">
			<h4 class="topic">ACCOUNT & PROFILE INFORMATION</h4>
			When you use our Services we may require and use certain information such as a username, valid email address and password. In addition, users may create a profile that includes information such as their geography, first and last name, gender, phone number, interests and associated information, including photos they may wish to upload. 
			Any information users share in publicly-available profiles is their own responsibility. You should carefully consider the risks of making certain personal information—particularly information such as address or precise location information—publicly available.  
		</p>
	
		<p class="container">
			<h4 class="topic">WEBSITE & MOBILE DATA</h4>
			We may automatically receive and log information on our servers from your browser or device including your IP address, software and hardware attributes, pages that you request, mobile identifiers, information about app usage, and other device or systems-level information. This can occur on our website or mobile app, or on third parties’ services
		</p>

		<p class="container">
			<h4 class="topic">COOKIES</h4>
			Most major desktop and mobile web browsers (e.g Safari, Firefox, Internet Explorer, Chrome, Opera) provide controls that allow you to limit or block the setting of cookies on your systems. Note that disabling cookies in your browser for either first-party domains (the sites you actively visit) or third-party domains (companies other than those you directly visit on the Web) may result in decreased functionality in certain instances. 
		</p>

		<p class="container">
			<h4 class="topic">SECURITY</h4>
			All information we collect is protected by reasonable technical means and reasonable security procedures in order to prevent unauthorized access or use of data.
		</p>	

	</section>
</center>

<?php include 'includes/footer.php'; ?>
</body>
</html>