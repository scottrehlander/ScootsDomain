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
	$guestbook = 'guestbook.dat';
        # Hide harmless warning messages that confuse users.
        # If you have problems and you don't know why,
        # comment this line out for a while to get more
        # information from PHP
        error_reporting (E_ALL ^ (E_NOTICE | E_WARNING));

	# Undo magic quotes - useless for flat files,
	# and inadequate and therefore dangerous for databases.	
	function stripslashes_nested($v)
	{
		if (is_array($v)) {
			return array_map('stripslashes_nested', $v);
		} else {
			return stripslashes($v);
		}
	}

	if (get_magic_quotes_gpc()) {
		$_GET = stripslashes_nested($_GET);
		$_POST = stripslashes_nested($_POST);
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
.style4 {
	font-size: 12px;
	font-weight: bold;
}
-->
</style></head>

<body>
<left>
  <table width="150" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="215" rowspan="2" align="center" valign="top"><p>&nbsp;</p>
        <p align="left"><img src="map1.jpg" width="215" height="338" border="0" usemap="#Map"></p>
        <p><center>
          <script language="javascript" type="text/javascript">
	var data, p;
	var agt=navigator.userAgent.toLowerCase();
	p='http';
	if((location.href.substr(0,6)=='https:')||(location.href.substr(0,6)=='HTTPS:')) {p='https';}
	data = '&r=' + escape(document.referrer) + '&n=' + escape(navigator.userAgent) + '&p=' + escape(navigator.userAgent) + '&g=' + escape(		document.location.href);
	if(navigator.userAgent.substring(0,1)>'3') {data = data + '&sd=' + screen.colorDepth + '&sw=' + escape(screen.width+ 'x'+screen.height)};document.write('<a href="http://www.mxcounters.com/stats.php?i=4633" target="_blank" >');
	document.write('<img border=0 hspace=0 '+'vspace=0 alt="web counters" src="http://www.mxcounters.com/counter.php?i=4633' + data + '">');
	document.write('</a>');
	</script></center>
        </p>
        <p align="left">
          
          <span class="style4">Guestbook:</span>
          <?php
	$password = "";
	if ($_POST['password'] == $adminPassword) {
		$admin = 1;
		$password = $adminPassword;
	} else if (strlen($_POST['password'])) {
		echo("<h2>Login Failed (Bad Password)</h2>\n");
	}
?>
        </p>
        <center>
          <table width="227" border="1" align="left" cellpadding="0" cellspacing="0">
            <tr>
              <th width="38" align="left">Date:</th>
              <th width="45" align="left">Name:</th>
              <th width="136" align="left">Comment:</th>
            </tr>
            <?php
	if ($_POST['submit']) {
		$file = fopen($guestbook, "a");
		if (!$file) {
			die("Can't write to guestbook file");
		}
		$date = date('m-j-Y');
		$id = rand();
		$name = $_POST['name'];
		$comment = $_POST['comment'];
		$name = clean($name, 40);
		$comment = clean($comment, 500);
		fwrite($file, 
			"$date\t$name\t$comment\t$id\n");
		fclose($file);	
	}
	$file = fopen($guestbook, 'r');
	$tfile = null;
	if ($file) {
		while (!feof($file)) {
			$line = fgets($file);
			$line = trim($line);
			list ($date, $name, $comment, $id) = 
				split("\t", $line, 4);
			if (!strlen($date)) {
				break;
			}
			if (!strlen($id)) {
				// Support my old version
				$id = $date;
			}	
			echo "<tr><td>$date</td><td>$name</td>";
			echo "<td>$comment</td>";
			echo "</tr>\n";
		}
		fclose($file);
	}
	function clean($name, $max) {
		# Turn tabs and CRs into spaces so they can't 
		# fake other fields or extra entries
		$name = ereg_replace("[[:space:]]", ' ', $name);
		# Escape < > and and & so they 
		# can't mess withour HTML markup
		$name = ereg_replace('&', '&amp;', $name);
		$name = ereg_replace('<', '&lt;', $name);
		$name = ereg_replace('>', '&gt;', $name);
		# Don't allow excessively long entries
		$name = substr($name, 0, $max);
		# Undo PHP's "magic quotes" feature, which has
		# inserted a \ in front of any " characters.
		# We undo this because we're using a file, not a
		# database, so we don't want " escaped. Those
		# using databases should do the opposite:
		# call addslashes if get_magic_quotes_gpc()
		# returns false.
		return $name;
	}
	function passwordField() {
		global $admin;
		global $password;
		if (!$admin) {
			return;
		}
		hiddenField('password', $password);
	}
	function hiddenField($name, $value) {
		echo "<input type=\"hidden\" " .
			"name=\"$name\" value=\"$value\">";
	}
?>
          </table>
			
          <p align="left">&nbsp;</p>
          <p align="left">&nbsp;</p>
          <p align="left">&nbsp;</p>
          <p align="left">&nbsp;</p>
          <p align="left">&nbsp;</p>
          <p align="left">&nbsp;</p>
          <p align="left">&nbsp;</p>
          <p align="left">&nbsp;</p>
          <p align="left">&nbsp;</p>
          <p align="left">&nbsp;</p>
          <p align="left">&nbsp;</p>
          <p align="left">&nbsp;</p>
          <p align="left">&nbsp;</p>
          <p align="left">&nbsp;</p>
          <p align="left">&nbsp;</p>
          <p align="left">&nbsp;</p>
          <p align="left">&nbsp;</p>
          <p align="left">&nbsp;</p>
          <p align="left"><span class="style4">Sign the Guestbook:</span></p>
          <table width="227" border="1" cellspacing="0" cellpadding="0">
            <tr>
              <td><form action="index.php" method="POST">
                <table border="0" cellpadding="5" cellspacing="5">
                    <tr>
                      <th width="69" align="left">Name:</th>
                      <td width="121"><input name="name" style="background:#000000; color:#FFFFFF" size="17" maxlength="15"></td>
                    </tr>
                    <tr>
                      <th valign="top">Comment:</th>
                      <td><textarea name="comment" cols="13" rows="4" style="background:#000000; color:#FFFFFF"></textarea></td>
                    </tr>
                    <tr>
                      <th colspan="2"> <input type="submit" name="submit" value="Sign the Guestbook" style="background:#000000; color:#FFFFFF">
                      </th>
                    </tr>
                  </table>
                  <?php
	passwordField();
?>
                  <!-- End MxCounters Code -->
                </form></td>
            </tr>
          </table>
        </center>        </td>
      <td align="left"><img src="scootwebd.gif" width="511" height="144"></td>
    </tr>
    <tr>
      <td width="511" align="center" valign="top"><p>&nbsp;</p>
        <p>Welcome to Scoot's Domain </p>
        <p><a href="http://sites.gizoogle.com/index.php?url=http%3A//scoot.sytes.net/index.php" target="_blank" class="style4">[ click here for gangster version ] </a></p>
        <p>&nbsp;</p>
        <table width="328" border="1" cellspacing="0" cellpadding="0">
          <tr>
            <td width="256" align="center"><div align="center"><strong>10/3/06</strong></div></td>
          </tr>
        </table>
        <table width="328" height="0" border="1" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
          <tr>
            <td width="324" align="left" bgcolor="#35379E"><p><span class="style3">I put up a Guestbook that I made in PHP for this site. Sign it to help me test it out!! I also added an option to gangsterize this site right above this text. The links stop working after you gangsterize it, but it's just for fun. After you do it to my website, type in your myspace and read what you would have said if you were a gangster... Good times. Later jerks. </span></p>
              <p class="style3">Site -still- Under Construction </p></td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <table width="328" border="1" cellspacing="0" cellpadding="0">
          <tr>
            <td width="256" align="center"><div align="center"><strong>9/29/06</strong></div></td>
          </tr>
        </table>
        <table width="328" height="0" border="1" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
          <tr>
            <td width="324" align="left" bgcolor="#35379E"><p><span class="style3">Put up a whole bunch of new Car Audio pics. That section is coming together well... Just a few more albums to go up, including a huge one from Spring Break Nationals (the show covered by Mythbusters this year). I also want to get up a personal Gallery soon. Later. </span><span class="style3"></span></p>
                <p class="style3">Site -still- Under Construction </p></td>
          </tr>
        </table>
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
            <td width="324" align="left" bgcolor="#35379E"><p><span class="style3">Ok, I've been super busy (and lazy at the same time) lately, so I don't have much more up yet. Two more <a href="caraudio.html">car audio albums</a> have been updated from earlier in the season... I've still got a whole bunch more to go - so check back later.</span></p>
              <p><span class="style3">If you tried to get to my <a href="http://scootcam.sytes.net">webcam</a> and got redirected back here, that means my server is not online. I will soon get it to redirect to a page that will let you know exactly what the dilly be. </span></p>
              <p><span class="style3">I also changed the <a href="bio.html">About Me</a> section so it didn't sound so stupid. If you guys find any dead links please lmk... <a href="mailto:xi2elic@aol.com">xi2elic@aol.com</a> </span></p>
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
            <td width="324" align="left" bgcolor="#35379E"><p class="style3">It's been awhile since I updated, and thought that I should say a few words. I'll be getting all my <a href="caraudio.html">car audio pics</a> up here soon. Finals is coming up in Louisville this year - so I will have tons of new pictures of the best of the best in the spl world. </p>
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
<center>
</center>


<map name="Map"><area shape="rect" coords="87,88,165,117" href="http://scoot.sytes.net">
<area shape="rect" coords="72,132,191,156" href="caraudio.html">
<area shape="rect" coords="71,173,186,203" href="bio.html">
<area shape="rect" coords="77,224,161,245" href="http://scootcam.sytes.net">
</map>
<div align="right">VIP Access:
  <input name="password" style="background:#000000; color:#FFFFFF" id="password" type="password" tabindex="2" size="17">
  <input type="submit" name="Submit" value="Submit" tabindex="3" style="background:#000000; color:#FFFFFF">
  </label>
</div>
</body>
</html>