<?php error_reporting(0);
$EUAregionName = "United Kingdom, London and South East"; //change to reflect your own region
$EUCode = "https://www.meteoalarm.eu/en_UK/0/0/UK013-London%20&%20South%20East.html"; //browse to your own location at https://www.meteoalarm.eu and copy the url.
/* do not change any code below this line
/* ----------------------------------------------------------------------------------------
Date: Thu, 11 Sep 2008 11:39:52 +0200
From: karin buchauer <karin.buchauer@zamg.ac.at>
Organization: zamg

Dear Mr True,

you are quite right:
you can use the material featured on the website, without modifying it, providing the source (link) as well as time and date of issue of the data, as stipulated in the Terms & Conditions.

With best regards,
Karin Buchauer



Ken True schrieb:
> Dear Sirs,
>
> I am an amateur weather enthusiast who also writes scripting for other weather enthusiasts to incorporate weather data into their personal, non-commercial weather websites.  Many of my scripts (which I write as a hobby, and are distributed gratis) are in use on personal weather websites worldwide.
>
> I've had requests to package the excellent data from www.meteoalarm.eu for weather advisories in EU countries, and before I generate a script for that purpose, I'd like to have your permission to proceed.
>
> Your Terms and Conditions page (http://www.meteoalarm.eu/terms.asp?lang=EN ) says:
>
> "The material featured on this site is the common property of the Meteoalarm partners, and is subject to copyright protection.
> The ownership and intellectual rights on all operational and updated awareness and warning information delivered to the Meteoalarm system remain with the Meteoalarm partners who originally delivered this information. The information on this web site may be used freely by the public.
> Before using information obtained from this server special attention should be given to the date & time of the data and products being displayed.
> In case this information is re-used: This information shall not be modified in content and the source of the information has always to be displayed as EUMETNET - MeteoAlarm, or if a single country, the providing national Institute (for internet application in all cases in the form of a link to: www.meteoalarm.eu). The time of issue at www.meteoalarm.eu must be count.
>
> Third parties producing copyrighted works consisting predominantly of the material of this website must provide notice with such work(s) identifying the source of material incorporated and stating that such material is not subject to copyright protection. Further information can be obtained from this following address: meteoalarm@zamg.ac.at"
>
> My reading of this implies that you do permit re-use/publishing of the information with attribution and an active link to the source page for the data on your site, and a note that the data is copyrighted by the data providing organization (and not subject to copyright by the 3rd-party website including/displaying the data).  Is that correct?
>
> Is it ok with you for me to generate a script for displaying national/regional weather alerts using your data from www.meteoalarm.eu with the appropriate attribution.
>
> Please feel free to examine other scripts I've written which use NOAA, Environment Canada, US Geological Services, and temis.nl as data sources (http://saratoga-weather.org/scripts.php ).
>
> Thank you in advance for your response,
>
> Best regards,
> Ken True
> webmaster@saratoga-weather.org
> Saratoga, California, USA

-- 

Karin Buchauer
Assistant to the Project Manager EMMA

Zentralanstalt für Meteorologie und Geodynamik
Regionalstelle für Salzburg und Oberösterreich
Freisaalweg 16
A - 5020 SALZBURG
Fon ++43 (0)662 626301-22
Fax ++43 (0)662 625838
karin.buchauer@zamg.ac.at       www.zamg.ac.at

/* ----------------------------------------------------------------------------------------
Script by steepleian 2019 (drawing extensively from Ken True's, (saratoga-weather.org) original idea)
Thanks also to David at Villar Perosa who provided some early script suggestions which helped get this project started.
As always to Brian Underdown who designed the weather34 template.
 ----------------------------------------------------------------------------------------- */
include('livedata.php');include('common.php');
date_default_timezone_set($TZ);
$json_string = file_get_contents('jsondata/darksky.txt');
$parsed_json = json_decode($json_string);
$alerttype = $parsed_json->{'alerts'}[0]->{"title"};
$type = explode(" ", $alerttype);
$alertlevel = $type[0];
$alerttype = $type[1];
$alerttime = $parsed_json->{'alerts'}[0]->{"expires"};
$alertseverity = $parsed_json->{'alerts'}[0]->{"severity"};
$alertexp = date('H:i d M',$alerttime);
$alertiss = $parsed_json->{'alerts'}[0]->{"time"};

$alertissued = date('H:i d M',$alertiss);

$warnTxt = $parsed_json->{'alerts'}[0]->{"description"};

$from = "From: ";
$until = "Until: ";
$level = "Level: :"; 

if ($alertlevel=='Yellow' && $alerttype=='Wind') {$warnimage="Wind_Yellow.jpg";$bgcolor="yellow";}
else if ($alertlevel=='Orange' && $alerttype=='Wind') {$warnimage="Wind_Orange.jpg";$bgcolor="orange";}
else if ($alertlevel=='Red' && $alerttype=='Wind') {$warnimage="Wind_Red.jpg";$bgcolor="red";}
else if ($alertlevel=='Yellow' && $alerttype=='Snow/Ice') {$warnimage="siy.jpg";$bgcolor="yellow";}
else if ($alertlevel=='Orange' && $alerttype=='Snow/Ice') {$warnimage="sio.jpg";$bgcolor="orange";}
else if ($alertlevel=='Red' && $alerttype=='Snow/Ice') {$warnimage="sir.jpg";$bgcolor="red";}
else if ($alertlevel=='Yellow' && $alerttype=='Thunderstorms') {$warnimage="ty.jpg";$bgcolor="yellow";}
else if ($alertlevel=='Orange' && $alerttype=='Thunderstorms') {$warnimage="to.jpg";$bgcolor="orange";}
else if ($alertlevel=='Red' && $alerttype=='Thunderstorms') {$warnimage="tr.jpg";$bgcolor="red";}
else if ($alertlevel=='Yellow' && $alerttype=='Fog') {$warnimage="fy.jpg";$bgcolor="yellow";}
else if ($alertlevel=='Orange' && $alerttype=='Fog') {$warnimage="fo.jpg";$bgcolor="orange";}
else if ($alertlevel=='Red' && $alerttype=='Fog') {$warnimage="fr.jpg";$bgcolor="red";}
else if ($alertlevel=='Yellow' && $alerttype=='Extreme high temperature') {$warnimage="ehty.jpg";$bgcolor="yellow";}
else if ($alertlevel=='Orange' && $alerttype=='Extreme high temperature') {$warnimage="ehto.jpg";$bgcolor="orange";}
else if ($alertlevel=='Red' && $alerttype=='Extreme high temperature') {$warnimage="ehtr.jpg";$bgcolor="red";}
else if ($alertlevel=='Yellow' && $alerttype=='Extreme low temperature') {$warnimage="elty.jpg";$bgcolor="yellow";}
else if ($alertlevel=='Orange' && $alerttype=='Extreme low temperature') {$warnimage="elto.jpg";$bgcolor="orange";}
else if ($alertlevel=='Red' && $alerttype=='Extreme low temperature') {$warnimage="eltr.jpg";$bgcolor="red";}
else if ($alertlevel=='Yellow' && $alerttype=='Coastal Event') {$warnimage="cey.jpg";$bgcolor="yellow";}
else if ($alertlevel=='Orange' && $alerttype=='Coastal Event') {$warnimage="ceo.jpg";$bgcolor="orange";}
else if ($alertlevel=='Red' && $alerttype=='Coastal Event') {$warnimage="cer.jpg";$bgcolor="red";}
else if ($alertlevel=='Yellow' && $alerttype=='Forestfire') {$warnimage="ffy.jpg";$bgcolor="yellow";}
else if ($alertlevel=='Orange' && $alerttype=='Forestfire') {$warnimage="ffo.jpg";$bgcolor="orange";}
else if ($alertlevel=='Red' && $alerttype=='Forestfire') {$warnimage="ffr.jpg";$bgcolor="red";}
else if ($alertlevel=='Yellow' && $alerttype=='Avalanches') {$warnimage="ay.jpg";$bgcolor="yellow";}
else if ($alertlevel=='Orange' && $alerttype=='Avalanches') {$warnimage="ao.jpg";$bgcolor="orange";}
else if ($alertlevel=='Red' && $alerttype=='Avalanches') {$warnimage="ar.jpg";$bgcolor="red";}
else if ($alertlevel=='Yellow' && $alerttype=='Rain') {$warnimage="ry.jpg";$bgcolor="yellow";}
else if ($alertlevel=='Orange' && $alerttype=='Rain') {$warnimage="ro.jpg";$bgcolor="orange";}
else if ($alertlevel=='Red' && $alerttype=='Rain') {$warnimage="rr.jpg";$bgcolor="red";}
else if ($alertlevel=='Yellow' && $alerttype=='Flood') {$warnimage="fly.jpg";$bgcolor="yellow";}
else if ($alertlevel=='Orange' && $alerttype=='Flood') {$warnimage="flo.jpg";$bgcolor="orange";}
else if ($alertlevel=='Red' && $alerttype=='Flood') {$warnimage="flr.jpg";$bgcolor="red";}
else if ($alertlevel=='Yellow' && $alerttype=='Rain-Flood') {$warnimage="rfy.jpg";$bgcolor="yellow";}
else if ($alertlevel=='Orange' && $alerttype=='Rain-Flood') {$warnimage="rfo.jpg";$bgcolor="orange";}
else if ($alertlevel=='Red' && $alerttype=='Rain-Flood') {$warnimage="rfr.jpg";$bgcolor="red";}
else if ($alertlevel=='Yellow') {$warnimage="yi.jpg";$bgcolor="yellow";}
else if ($alertlevel=='' && $alerttype=='')   {$warnimage="No Other Warnings_Green.jpg";$bgcolor="#99ff99";$warnTxt="No particular awareness of weather required";$alertissued="";$alertexp="";$from = "";$until = "";$level = ""; }

?>	
  


<div class="" style="background:0; color:transparent; font-family: arial; margin:5px; height: auto; width: auto%;"><!-- container for external scripts --><!-- $wrn_lang=en  --><div style="width: 98%; margin: 0 auto; background-color: transparent; color: black;">
<h3 style="color: silver; font-size: 18px;">&nbsp;Weather Warnings&nbsp;<?php echo $EUAregionName ?>&nbsp;</h3>
<table style="width: 100%; border-collapse: collapse;">
<tbody>
<tr style="background-color: <?php echo $bgcolor ?>">
    <td rowspan="3" style="width: 250px;">
        <img src="./wrnImages/<?php echo $warnimage ?>" alt=" " 
                style="width: 250px; height: 167px; margin: 5px; vertical-align: top;">
    </td>
    <td colspan= "2" style="text-align: left; font-size: 12px;">
        <span style="margin: 5px 5px 0px 5px; display: block;"><b>
        <?php echo $from ?></b><?php echo $alertissued ?>&nbsp;&nbsp;&nbsp;<b><?php echo $until ?></b><?php echo $alertexp ?></span>
    </td>
</tr>
<tr style="background-color: <?php echo $bgcolor ?>; font-size: 12px;">
    <td style="text-align: left; "><span style="margin-left: 5px;"><b><?php echo $alerttype ?>&nbsp;</b></span></td>
    <td style="text-align: right;"><span style="margin-right: 5px;"> <?php echo $level ?><b><?php echo $alertlevel ?>&nbsp;</b></span></td>
</tr>
<tr style="background-color: <?php echo $bgcolor ?>">
    <td colspan= "2" style="text-align: left;font-size: 12px; ">
    <p style="margin: 5px 5px 15px 5px; padding: 5px 0px 5px 5px; background-color: <?php echo $bgcolor ?>; color: black;"><?php echo $warnTxt ?></p>
    </td>
</tr>
<tr style="height: 4px; background-color: transparent;"><td colspan="2"> </td></tr>
</tbody>
</table>
<body link="white" vlink="grey">  
<p style="width: 90%; margin: 5px auto; padding: 10px; color: silver; font-size: 10px;">METEOalarm data delivery is via the DarkSky API<br>
<a href="<?php echo $EUCode ?>" target="_blank"> Warning data</a> courtesy of and Copyright © EUMETNET-METEOalarm (http://www.meteoalarm.eu/). 
Used with permission.
<br>Time delays between this website and the www.meteoalarm.eu website are possible, 
for the most up to date information about alert levels as published by the participating National Meteorological Services 
please use <a href="<?php echo $EUCode ?>" target="_blank">www.meteoalarm.eu</a></p>
</body>
</div>
