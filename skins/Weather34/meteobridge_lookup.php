<?php 
include('w34stats.php');
$cumulus_live = file_get_contents($livedata);
$cumulus = explode(" ", $cumulus_live);
$cumulus = array_map(function($v) { if($v == 'NULL') {
	return null; } return $v; }, $cumulus);
if (sizeof($cumulus) >= 47){
$meteobridgeapi[0]=	$cumulus[0];//$nowdate; //current date dd/mm/yyyy //$recordDate = mktime(substr($meteobridgeapi[1], 0, 2), substr($meteobridgeapi[1], 3, 2), substr($meteobridgeapi[1], 6, 2),substr($meteobridgeapi[0], 3, 2), substr($meteobridgeapi[0], 0, 2), $year);
$meteobridgeapi[1]=	$cumulus[1];//$nowtime; //current time hh:mm:ss  //$recordDate = mktime(substr($meteobridgeapi[1], 0, 2), substr($meteobridgeapi[1], 3, 2), substr($meteobridgeapi[1], 6, 2),substr($meteobridgeapi[0], 3, 2), substr($meteobridgeapi[0], 0, 2), $year);
$meteobridgeapi[2]=	$cumulus[2];//$nowtemp; //current temp //$weather["temp"]               = $meteobridgeapi[2];
$meteobridgeapi[3]=	$cumulus[3];//$nowhum; //current humidity //$weather["humidity"]           = number_format($meteobridgeapi[3],0);	
$meteobridgeapi[4]=	$cumulus[4];//$nowdew; //current dewpoint //$weather["dewpoint"]           = number_format($meteobridgeapi[4],1);
$meteobridgeapi[5]=	$cumulus[5];//$nowwind; //current windspeed //$weather["wind_speed_avg"]     = $meteobridgeapi[5];$weather["wind_speed"]         = number_format($meteobridgeapi[5]);
$meteobridgeapi[6]=	$cumulus[6];//$nowwindgust; //current wind gust spped //$weather["wind_gust_speed"]    = $meteobridgeapi[6];
$meteobridgeapi[7]=	$cumulus[7];//$nowwinddir; //current wind direction //$weather["wind_direction"]     = number_format($meteobridgeapi[7],0);
$meteobridgeapi[8]=	$cumulus[8];//$nowrainrate; //current rainrate //$weather["rain_rate"]          = $meteobridgeapi[8];
$meteobridgeapi[9]=	$cumulus[9];//$dayrainsum;    //today rain sum
$meteobridgeapi[10]=	$cumulus[10];//$nowbarom; //current barometer //$weather["barometer"]          = $meteobridgeapi[10];$weather["barotrend"] =   $meteobridgeapi[10] -  $barotrend[0];	$weather['barometer6h'] = $meteobridgeapi[10] - $meteobridgeapi[73];
$meteobridgeapi[11]=	$meteobridgeapi[7];//current wind direction
$meteobridgeapi[12]=	$cumulus[12];//$nowbeaufort; //current wind beaufort //$weather["wind_speed_bft"]     = $meteobridgeapi[12];
$meteobridgeapi[13]=	$cumulus[13];//$windunits;//N/A PROBABLY WIND UNITS
$meteobridgeapi[14]=	$cumulus[14];//N/A PROBABLY TEMP UNITS
$meteobridgeapi[15]=	$cumulus[15];//$baromunits;//$weather["barometer_units"]    = $meteobridgeapi[15]; // mb or hPa or in
$meteobridgeapi[16]=	$cumulus[16];//$rainunits;//$weather["rain_units"]         = $meteobridgeapi[16];
$meteobridgeapi[17]=	$last5minwind;//average wind speed 5 minutes
$meteobridgeapi[18]=	$last60minbaromavg;//1 hour barometer average $weather["barometer_trend"]    = $meteobridgeapi[10] - $meteobridgeapi[18];
$meteobridgeapi[19]=	$cumulus[19];//$monthrainsum; //month rain
$meteobridgeapi[20]=	$cumulus[20];//$yearrainsum; //year rain sum
$meteobridgeapi[21]=	$cumulus[21];//$yesterdayrainsum; //yesterday rain sun//N/A
$meteobridgeapi[22]=	$cumulus[22];//$nowintemp; //current indoor temp //$weather["temp_indoor"]        = $meteobridgeapi[22];
$meteobridgeapi[23]=	$cumulus[23];//$nowinhum; //current indoor humidity  ;//$weather["humidity_indoor"]    = $meteobridgeapi[23];$weather["temp_humidity_trend"] = number_format($meteobridgeapi[23],1) - number_format($meteobridgeapi[71],1);//indoor$weather["temp_indoor_feel"]   = heatIndex($meteobridgeapi[22], $meteobridgeapi[23]); 
$meteobridgeapi[24]=	$cumulus[24];//$nowwindchill; //current windchill //$weather["windchill"]          = $meteobridgeapi[24];
$meteobridgeapi[25]=	$last60mintempmax; // $meteobridgeapi[123]
$meteobridgeapi[26]=	$daymaxtemp; //temp max today $weather["temp_today_high"]    = $daymaxtemp; //temp max today $meteobridgeapi[26];
$meteobridgeapi[27]=	$daymaxtemptime;//date($timeFormatShort, $meteobridgeapi[27]);
$meteobridgeapi[28]=	$daymintemp; //temp min today  $weather["temp_today_low"]     = $daymintemp; //temp min today $meteobridgeapi[28];
$meteobridgeapi[29]=	$daymintemptime; //date($timeFormatShort, $meteobridgeapi[29]);
$meteobridgeapi[30]=	$daymaxwind; //$weather["wind_speed_max"]     = $meteobridgeapi[30];		
$meteobridgeapi[31]=	$daymaxwindtime; //$weather["maxwindtime"]        = $windavgdmaxtime; //date($timeFormatShort, strtotime($meteobridgeapi[31]));
$meteobridgeapi[32]=	$daymaxgust; //wind max today 
$meteobridgeapi[33]=	$daymaxgusttime; //$weather["maxgusttime"]        = date($timeFormatShort, strtotime($meteobridgeapi[33]));
$meteobridgeapi[34]=	$daymaxbarom; //max today baro 
$meteobridgeapi[35]=	$daymaxbaromtime;//$baromaxoriginalDate = $meteobridgeapi[35];
$meteobridgeapi[36]=	$dayminbarom; //min today baro
$meteobridgeapi[37]=	$dayminbaromtime; //$barominoriginalDate = $meteobridgeapi[37];
$meteobridgeapi[38]=	$cumulus[38];//$weewxversion;//$weather["swversion"]		   = $meteobridgeapi[38];
$meteobridgeapi[39]=	$cumulus[39];//$weewxbuild;//$weather["build"]			   = $meteobridgeapi[39];
$meteobridgeapi[40]=	$cumulus[40];//$last10minmaxwind; //last 10 min max wind //N/A
$meteobridgeapi[41]=	$hdwplatform; //$weather["mbplatform"]	       = $meteobridgeapi[41];
$meteobridgeapi[42]=	$hdwactual; //$weather["actualhardware"]	   = $meteobridgeapi[42];//$weather["heat_index"]         = $meteobridgeapi[42];
$meteobridgeapi[43]=	$cumulus[43];//$currentuv;//current uv //$weather["uv"]                 = $meteobridgeapi[43];
$meteobridgeapi[44]=	$last24hoursrain; //last24hrs rain 
$meteobridgeapi[45]=	$cumulus[45];//$currentsolar; //current solar radiation //$weather["solar"]              = round($meteobridgeapi[45],1);$weather["lux"] 			   = number_format($meteobridgeapi[45]/0.00809399477,0, '.', '');
$meteobridgeapi[46]=	$cumulus[46];//$last10minwinddir; //last 10 min wind direction average $weather["wind_direction_avg"] = number_format($meteobridgeapi[46],0);
$meteobridgeapi[47]=	$cumulus[47];//$lasthourrain; //lastHour rain sum
$meteobridgeapi[48]=	$monthmaxdewpoint; //dew max month
$meteobridgeapi[49]=	$monthmaxdewpointtime;
$meteobridgeapi[50]=	$monthmindewpoint; //dew min month
$meteobridgeapi[51]=	$monthmindewpointtime;
$meteobridgeapi[52]=	$yesterdaymaxdewpoint; //dew max year
$meteobridgeapi[53]=	$yesterdaymaxdewpointtime;
$meteobridgeapi[54]=	$yearmaxdewpoint; //dew max year
$meteobridgeapi[55]=	$yearmaxdewpointtime;  //$weather["sunshine"]           = $meteobridgeapi[55];
$meteobridgeapi[56]=	$yearmindewpoint; //year min dew //$weather["dewymin"]		    = $meteobridgeapi[56]; 
$meteobridgeapi[57]=	$yearmindewpointtime; //$weather["sunny"]          	   = $meteobridgeapi[57];$originalDate45 = $meteobridgeapi[57];$dewymintime =  date('jS M', strtotime($originalDate45));
$meteobridgeapi[58]=	$daymaxuv; //day max uv //$weather["uvdmax"]		    = number_format($meteobridgeapi[58],1); $weather["maxuv"]              = $meteobridgeapi[58];	
$meteobridgeapi[59]=	$daymaxhum; //today hum max 
$meteobridgeapi[60]=	$daymaxhumtime;
$meteobridgeapi[61]=	$daymimhum; //today hum min 
$meteobridgeapi[62]=	$dayminhumtime;
$meteobridgeapi[63]=	$daymaxdewpoint; //dew max today
$meteobridgeapi[64]=	$daymaxdewpointtime;
$meteobridgeapi[65]=	$daymindewpoint; //dew min today
$meteobridgeapi[66]=	$daymindewpointtime;
$meteobridgeapi[67]=	$last15mintempavg;//last 15 min temp avg $weather["temp_avg15"]         = $meteobridgeapi[67];$weather["temp_trend"]         =  number_format($meteobridgeapi[2],1) -  number_format($meteobridgeapi[67],1) ;
$meteobridgeapi[68]=	$last15minhumavg; //last 15 min temp avg $weather["humidity_trend"]     =  number_format($meteobridgeapi[3],0) -  number_format($meteobridgeapi[68],0);
$meteobridgeapi[69]=	$last15mindewpointavg; //last 15 min dewpoint avg //$weather["dewpoint_trend"]     =  number_format($meteobridgeapi[4],1) -  number_format($meteobridgeapi[69],1);
$meteobridgeapi[70]=	$last15minIntempavg; //last 15 min in temp avg $weather["temp_indoor_trend"]  =  number_format($meteobridgeapi[22],1) - number_format($meteobridgeapi[70],1);//indoor
$meteobridgeapi[71]=	$last15minInhumavg; //last 15 min in humidity avg $weather["temp_humidity_trend"] = number_format($meteobridgeapi[23],1) - number_format($meteobridgeapi[71],1);//indoor
$meteobridgeapi[72]=	$last15minwind; //last 15 min wind speed avg $weather['winddir6h'] =	 $meteobridgeapi[72];$weather["wind_speed_avg15"]   = $meteobridgeapi[72];
$meteobridgeapi[73]=	$last30minwind; //last 35 min wind speed avg $weather['barometer6h'] = $meteobridgeapi[10] - $meteobridgeapi[73];$weather["wind_speed_avg30"]   = $meteobridgeapi[73];
$meteobridgeapi[74]=  	$weewxlignting; //[lgt0energy-act:--] ;//N/A
$meteobridgeapi[75]=	$weewxlignting; //$weather["lightningkm"]        = $meteobridgeapi[75];$weather["lightningmaxdist"]   = $meteobridgeapi[75];
$meteobridgeapi[76]=	$weewxlignting; //$weather["lightningtimeago"]   = $meteobridgeapi[76];$weather["lightning"]          = $meteobridgeapi[76];
$meteobridgeapi[77]=	$weewxlignting; //$weather["lightningmax"]       = $meteobridgeapi[77];
$meteobridgeapi[78]=	$weewxlignting; //$weather["lightningmonth"]     = $meteobridgeapi[78];
$meteobridgeapi[79]=	$weewxlignting; //$weather["lightningyear"]      = $meteobridgeapi[79];
$meteobridgeapi[80]=	$daymaxsolar; //max day solar radiation $weather["maxsolar"]           = number_format($meteobridgeapi[80],0);
$meteobridgeapi[81]=	$station_uptime;//muts change time format to seconds	//$station_uptime;//$weather["uptime"]		       = $meteobridgeapi[81];//uptime in seconds	
$meteobridgeapi[82]=	$yesterdaymaxtemp; //temp max yesterday
$meteobridgeapi[83]=	$yesterdaymaxtemptime;
$meteobridgeapi[84]=	$yesterdaymintemp;
$meteobridgeapi[85]=	$yesterdaymintemptime;
$meteobridgeapi[86]=	$monthmaxtemp; //temp max month
$meteobridgeapi[87]=	$monthmaxtemptime;
$meteobridgeapi[88]=	$monthmintemp; //temp min month
$meteobridgeapi[89]=	$monthmintemptime;
$meteobridgeapi[90]=	$yearmaxtemp; //temp max year
$meteobridgeapi[91]=	$yearmaxtemptime;
$meteobridgeapi[92]=	$yearmintemp; //temp min year
$meteobridgeapi[93]=	$yearmintemptime;
$meteobridgeapi[94]=	$yesterdaymaxgust; //wind max yesterday
$meteobridgeapi[95]=	$yesterdaymaxgusttime;
$meteobridgeapi[96]=	$monthmaxgust; //wind max month
$meteobridgeapi[97]=	$monthmaxgusttime; 
$meteobridgeapi[98]=	$yearmaxgust; //wind max year
$meteobridgeapi[99]=	$yearmaxgusttime;
$meteobridgeapi[100]=	$yesterdaymaxrainrate;  //rain max rate yesterday 
$meteobridgeapi[101]=	$monthmaxrainrate; //max rain rate month 
$meteobridgeapi[102]=	$monthmaxrainratetime;
$meteobridgeapi[103]=	$yearmaxrainrate; //max rain rate year
$meteobridgeapi[104]=	$yearmaxrainratetime;
$meteobridgeapi[105]=	$daymaxsolar; // day max solar //$weather["solardmax"]
$meteobridgeapi[106]=	$daymaxsolartime;//$solardmaxtime
$meteobridgeapi[107]=	$yesterdaymaxsolar;//yesterday max solar //$weather["solarydmax"]
$meteobridgeapi[108]=	$yesterdaymaxsolartime; //$solarydmaxtime
$meteobridgeapi[109]=	$monthmaxsolar; //month max solar //$weather["solarmmax"]
$meteobridgeapi[110]=	$monthmaxsolartime;  //$solarmmaxtime 
$meteobridgeapi[111]=	$yearmaxsolar; //year max solar //$weather["solarymax"]
$meteobridgeapi[112]=	$yearmaxsolartime; //$solarymaxtime
$meteobridgeapi[113]=	$daymaxuvtime; //$uvdmaxtime 
$meteobridgeapi[114]=	$yesterdaymaxuv; //yesterday max uv  //$weather["uvydmax"]		    = number_format($meteobridgeapi[114],1);
$meteobridgeapi[115]=	$yesterdaymaxuvtime;//$uvydmaxtime
$meteobridgeapi[116]=	$monthmaxuv; //month max uv //$weather["uvmmax"]		    = number_format($meteobridgeapi[116],1);
$meteobridgeapi[117]=	$monthmaxuvtime; //$uvmmaxtime
$meteobridgeapi[118]=	$yearmaxuv; //year max uv //$weather["uvymax"]		    = number_format($meteobridgeapi[118],1);
$meteobridgeapi[119]=	$yearmaxuvtime;//$uvymaxtime 
$meteobridgeapi[120]=	$yesterdaymindewpoint; //dew min year
$meteobridgeapi[121]=	$yesterdaymindewpointtime;
$meteobridgeapi[122]=	$weewxlastrecord; //last available time stamp //N/A
$meteobridgeapi[123]=	$last60mintempavg; // last 60 minutes out temp avg
$meteobridgeapi[124]=	$lastrainday; //last rain time $rainlastmonth $rainlasttoday $rainlasttoday1
$meteobridgeapi[125]=	$alltimemaxtemp; //temp alltime max
$meteobridgeapi[126]=	$alltimemaxtemptime; //alltime max temp time
$meteobridgeapi[127]=	$alltimemintemp; //temp alltime min
$meteobridgeapi[128]=	$alltimemintemptime; //alltime min temp time
$meteobridgeapi[129]=	$alltimemaxdewpoint; //dew max alltime
$meteobridgeapi[130]=	$alltimemaxdewpointtime; //alltime max dew time
$meteobridgeapi[131]=	$alltimemindewpoint; //dew min alltime
$meteobridgeapi[132]=	$alltimemindewpointtime; //alltime min dew time
$meteobridgeapi[133]=	$alltimemaxgust; //alltime max wind 
$meteobridgeapi[134]=	$alltimemaxgusttime; //alltime max gust time
$meteobridgeapi[135]=	$yesterdaymaxbarom; //max yesterday baro 
$meteobridgeapi[136]=	$yesterdaymaxbaromtime; //yd max baro time
$meteobridgeapi[137]=	$yesterdayminbarom; //min yesterday baro 
$meteobridgeapi[138]=	$yesterdayminbaromtime; //yd min baro time
$meteobridgeapi[139]=	$monthmaxbarom; //max month baro
$meteobridgeapi[140]=	$monthmaxbaromtime; // max month baro time
$meteobridgeapi[141]=	$monthminbarom; //min month baro 
$meteobridgeapi[142]=	$monthminbaromtime; //month min baro time
$meteobridgeapi[143]=	$yearmaxbarom; //max year baro
$meteobridgeapi[144]=	$yearmaxbaromtime; //year max baro time
$meteobridgeapi[145]=	$yearminbarom; //min year baro 
$meteobridgeapi[146]=	$yearminbaromtime; //year min baro time
$meteobridgeapi[147]=	$alltimemaxbarom; //max all time baro
$meteobridgeapi[148]=	$alltimemaxbaromtime; //max alltime baro time
$meteobridgeapi[149]=	$alltimeminbarom; //min all time baro
$meteobridgeapi[150]=	$alltimeminbaromtime; //all time baro min time
$meteobridgeapi[151]=	$alltimerainsum;//all time rain sum
$meteobridgeapi[152]=	$dayavgtemp; //avg temp today
$meteobridgeapi[153]=	$moon_phase;//$weather["moonphase"]=$meteobridgeapi[153]
$meteobridgeapi[154]=	$moon_fullness;//$weather["luminance"]=$meteobridgeapi[154];
$meteobridgeapi[155]=	$lenghtofday; //$weather["daylight"]=$meteobridgeapi[155];
$meteobridgeapi[156]=	$moon_rise;//moon rise time hh:mm //$weather["moonrise"]='Rise<moonrisecolor> '.date($timeFormatShort, strtotime($meteobridgeapi[156]))
$meteobridgeapi[157]=	$moon_set; //moon set time hh:mm //$weather["moonset"]='Set<moonsetcolor> '.date($timeFormatShort, strtotime($meteobridgeapi[157]
$meteobridgeapi[158]=	$dayavgwind; //UNCERTAIN IF 30MIN OR DAY AVG
$meteobridgeapi[159]=	$monthmaxhum; //month max hum
$meteobridgeapi[160]=	$monthmaxhumtime; //month max hum time
$meteobridgeapi[161]=	$monthminhum; //month min hum
$meteobridgeapi[162]=	$monthminhumtime; //month min hum time
$meteobridgeapi[163]=	$yearmaxhum; //year max hum 
$meteobridgeapi[164]=	$yearmaxhumtime; //year hum max time
$meteobridgeapi[165]=	$yearminhum; //year min hum
$meteobridgeapi[166]=	$yearminhumtime; //year hum min time
$meteobridgeapi[167]=	$yesterdaymaxhum; //yesterday max hum
$meteobridgeapi[168]=	$yesterdayminhumtime; //yesterday min hum time
$meteobridgeapi[169]=	$yesterdayminhum;	//yesterday min hum
$meteobridgeapi[170]=	$yesterdayminhumtime;	//yesterday max hum time
$meteobridgeapi[173]=   $lastmonthrainsum; //last month rain sum  
$meteobridgeapi[184]=   $yearavgtemp;  //year avg temp
$meteobridgeapi[185]=   $yearavgwindgust;  //year avg wind gust  
}
?>
