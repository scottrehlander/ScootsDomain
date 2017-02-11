<?php
// we must never forget to start the session
session_start();

$errorMessage = '';
if (isset($_POST['password'])) {
    // check if the username and password combination is correct
    if ($_POST['password'] === 'chickensalad') {
        // the password is a match
        // set the session
        $_SESSION['basic_is_logged_in'] = true;
        
        // after login we move to the main page
        header('Location: downloads.php');
        exit;
    } else {
        $errorMessage = 'Sorry, wrong username / password';
    }
}
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Welcome to Scoot's Domain!</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	background-color: #000000;
}
body,td,th {
	color: #FFFFFF;
}
.style3 {color: #FFFFFF; font-weight: bold; font-size: 12px; }
a:link {
	color: #FFFFFF;
}
a:visited {
	color: #FFFFFF;
}
-->
</style></head>

<body>
<left>
  <table width="150" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td align="right" valign="bottom">
	  
	  <script language="javascript" type="text/javascript">
	var data, p;
	var agt=navigator.userAgent.toLowerCase();
	p='http';
	if((location.href.substr(0,6)=='https:')||(location.href.substr(0,6)=='HTTPS:')) {p='https';}
	data = '&r=' + escape(document.referrer) + '&n=' + escape(navigator.userAgent) + '&p=' + escape(navigator.userAgent) + '&g=' + escape(		document.location.href);
	if(navigator.userAgent.substring(0,1)>'3') {data = data + '&sd=' + screen.colorDepth + '&sw=' + escape(screen.width+ 'x'+screen.height)};document.write('<a href="http://www.mxcounters.com/stats.php?i=4633" target="_blank" >');
	document.write('<img border=0 hspace=0 '+'vspace=0 alt="web counters" src="http://www.mxcounters.com/counter.php?i=4633' + data + '">');
	document.write('</a>');
	</script>	  </td>
      <td align="left"><img src="../scootwebd.gif" width="511" height="144"></td>
    </tr>
    <tr>
      <td width="215" valign="top"><p><img src="../map1.jpg" width="215" height="338" border="0" usemap="#Map"></p>
	  
        <p>&nbsp;</p>
        <table width="221" border="0" cellspacing="0" cellpadding="0">
          <form name="frmAuthenticate" id="frmAuthenticate" method="post" action="">
            
            <tr>
              <td width="221"><label>VIP Access:
                  <input name="password" style="background:#000000; color:#FFFFFF" id="password" type="password" tabindex="2" size="17">
              </label></td>
            </tr>
            <tr>
              <td height="40" align="center"><label>
                <input type="submit" name="Submit" value="scoot's special area" tabindex="3" style="background:#000000; color:#FFFFFF">
              </label></td>
            </tr>
          </form>
        </table>
        <p>
          
          <!-- Start MxCounters Code -->
              </p>
        <center>

</center>
<!-- End MxCounters Code --></td>
      <td width="511" align="center" valign="top"><p>&nbsp;</p>
        <p>Welcome to Scoot's Domain </p>
        <p>&nbsp;</p>
        <table width="328" border="1" cellspacing="0" cellpadding="0">
          <tr>
            <td width="256" align="center"><div align="center"><strong>9/25/06</strong></div></td>
          </tr>
        </table>
        <table width="328" height="0" border="1" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
          <tr>
            <td width="324" align="left" bgcolor="#35379E"><p><span class="style3">I started learning PHP so that I could add some interactive elements to my websites. I've made a simple login script so that people can access certain parts of my server. If I give you the password to the VIP section please be respectful and don't give it out to everyone (err anyone). If you would like access, IM me. If you don't have my screenname you either haven't looked hard enough, or don't know me. Piece. </span><span class="style3"></span></p>
              <p class="style3">Site -still- Under Construction </p></td>
          </tr>
                </table>
        <p>&nbsp;</p><table width="328" border="1" cellspacing="0" cellpadding="0">
          <tr>
            <td width="256" align="center"><div align="center"><strong>9/22/06</strong></div></td>
          </tr>
        </table>
        <table width="328" height="0" border="1" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
          <tr>
            <td width="324" align="left" bgcolor="#35379E"><p><span class="style3">Ok, I've been super busy (and lazy at the same time) lately, so I don't have much more up yet. Two more <a href="../caraudio.html">car audio albums</a> have been updated from earlier in the season... I've still got a whole bunch more to go - so check back later.</span></p>
              <p><span class="style3">If you tried to get to my <a href="http://scootcam.sytes.net">webcam</a> and got redirected back here, that means my server is not online. I will soon get it to redirect to a page that will let you know exactly what the dilly be. </span></p>
              <p><span class="style3">I also changed the <a href="../bio.html">About Me</a> section so it didn't sound so stupid. If you guys find any dead links please lmk... <a href="mailto:xi2elic@aol.com">xi2elic@aol.com</a> </span></p>
              <p class="style3">Site -still- Under Construction </p></td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <table width="328" border="1" cellspacing="0" cellpadding="0">
          <tr>
            <td width="256" align="center"><div align="center"><strong>9/17/06</strong></div></td>
          </tr>
        </table>
        <table width="328" height="0" border="1" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
          <tr>
            <td width="324" align="left" bgcolor="#35379E"><p class="style3">It's been awhile since I updated, and thought that I should say a few words. I'll be getting all my <a href="../caraudio.html">car audio pics</a> up here soon. Finals is coming up in Louisville this year - so I will have tons of new pictures of the best of the best in the spl world. </p>
              <p class="style3">I'm working on getting a page hosted by another company to show when my webcam is offline. As of right now, if you try to view it and my <a href="http://scootcam.sytes.net">cam</a> is not on, it will just tell you the server is unavailable (which is the truth). </p>
              <p class="style3">So... no new updates other than me getting it up and back online. Adios </p>
              <p class="style3">Site -still- Under Construction </p></td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <table width="328" border="1" cellspacing="0" cellpadding="0">
          <tr>
            <td width="256" align="center"><div align="center"><strong>7/31/06</strong></div></td>
          </tr>
        </table>
        <table width="328" height="0" border="1" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
          <tr>
            <td width="324" align="left" bgcolor="#35379E"><p class="style3">Just got back from a 3x dbdrag in PA, and tired as hell.... but can't sleep, so I'm working on the site.</p>
              <p class="style3"> I got some new pics up of the Integra in the car audio section. I'm hoping to find some more pics of the first CRX. Also, I will be updating my progress on the newsst (my 3rd) CRX.</p>
              <p class="style3">The &quot;See Me&quot; section is my webcam that will only be available when my computer is online. If you get a page not available at any time.. my server is down, check back later.</p>
              <p class="style3">Site -still- Under Construction  </p></td>
          </tr>
        </table>        <p>&nbsp;</p>
        <table width="328" border="1" cellspacing="0" cellpadding="0">
          <tr>
            <td width="256" align="center"><div align="center"><strong>7/21/06</strong></div></td>
          </tr>
        </table>                <table width="328" height="0" border="1" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td width="324" align="left" bgcolor="#35379E"><p class="style3">As of right now the only thing up is the About Me section, and some pics of one of my old installs in &quot;Car Audio.&quot; </p>
            <p class="style3">I will be updating this page as I get more time, so be sure to check back. :] </p>
            <p class="style3">Site Under Construction </p>          </td>
        </tr>
      </table>      
      <p>(Best viewed at 1280x1024 resolution)  </p></td>
    </tr>
  </table>

</left>
<center></center>
<map name="Map">
  <area shape="rect" coords="70,83,171,123" href="../index.html">
  <area shape="rect" coords="72,128,194,161" href="../caraudio.html">
  <area shape="rect" coords="71,173,186,207" href="../bio.html">
  <area shape="rect" coords="73,222,163,252" href="http://scootcam.sytes.net" target="_self">
</map>
</body>
</html>
