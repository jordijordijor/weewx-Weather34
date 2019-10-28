# Installation Guide

This installation guide assumes that you are already reasonably familiar with WeeWX and that it is already installed on your computer along with a webserver, php and curl. For a light-touch webserver, Lighttpd is a good choice. A good guide for installing PHP 7.0 and Lighttpd on a RaspberryPi can be found at https://pimylifeup.com/raspberry-pi-lighttpd/

If you are carrying out a fresh install of WeeWX, you are strongly recommended to use the setup.py method (http://www.weewx.com/docs/setup.htm)

* Please familiarise yourself with the location of your WeeWX system files including your bin/user folder, skins folder and weewx.conf file. If you are unsure where to find these, please refer to the installation process here: - http://www.weewx.com/docs/ which shows various WeeWX installation scenarios.

IMPORTANT. After installing PHP please make sure you install all the PHP modules appropriate for your version of PHP. Failure to due so may mean that forecasts and current conditions fail to update. This is an example for PHP7.3 modules on a Debian based distribution: -

	apt-get install php7.3-pear php7.3-curl php7.3-dev php7.3-gd php7.3-mbstring php7.3-zip php7.3-mysql php7.3-xml

* Install PyePhem (https://rhodesmill.org/pyephem/). Typically for a Debian based distro use 'sudo apt-get install python-ephem'

* To enable WeeWX to communicate with the weather34 dashboard template, you must install the CRT plugin, (stands for Cumulus Real Time). Please follow the detailed instructions at https://github.com/weewx/weewx/wiki/crt. After installation edit the weewx-conf file. Go to the  [CumulusRealTime] which will likely be near the end of the script. Change this section to reflect the following: -

		[CumulusRealTime]
    			filename = /var/www/html/weewx/realtime.txt
    			unit_system = METRIC

	If your path to your web root is different, please amend the path in front of 'weewx/realtime.txt' accordingly.
	
	VERY IMPORTANT. It is crucial that the '[CumulusRealTime]' unit_system is set to METRIC as in the snippet above. If US or METRICWX setting is used, the resulting display will be un-predictable and even nonsensical! 

	
	Finally go to the '[StdReport]' section and add this: -

		[[w34skinReport]]
    			# The w34skinReport uses the 'w34skin' skin, which contains the
    			# templates for the WX-HWS charts.
    			skin = w34skin
    			enable = true
				
				[[[Units]]]
            			# The following section sets the units for w34skin.
            			# IMPORTANT do not change in any circumstance.
            				
					[[[[Groups]]]]
                				group_altitude = meter    
                				group_degree_day = degree_C_day   
                				group_pressure = hPa    
                				group_rain = mm   
                				group_rainrate = mm_per_hour    
                				group_speed = km_per_hour     
                				group_speed2 = km_per_hour2     
                				group_temperature = degree_C    
                				mbar = "mb"
                				hPa = "hPa"
                				inHg = "in"
                				mm_per_hour = "mm"
                				cm_per_hour = "cm"
                				inch_per_hour = "in"
               	 				km_per_hour = "km/h"
                				knot = "kts"
                				meter_per_second ="m/s"
                				mile_per_hour ="mph"
			
	Once completed, make sure you save weewx.conf


* Download the current version of WX-HWS-master zip file at https://github.com/steepleian/WX-HWS

This new version will require a clean install. Extract the .zip file into the root of your webserver and rename the resultant folder to a name of your choice, eg 'pws'

* Important. Depending on the configuration of your server, you may have to change your file permissions. Change all files and folders recursively in the root of your server to 0775 using CHMOD and user to your Linux login name and groups to www-data using CHOWN, either via the CLI or your server Control Panel (if you employ one). I use Webmin http://www.webmin.com/deb.html, an open source control panel which will make your tasks much easier.

* In the download you will find a folder called 'copy_folder_inside_into_skins_folder'. Inside is a folder called 'w34skin'. Copy or move the w34skin folder and its contents into your skins folder. In the '[CheetahGenerator]' section you will need to edit the skin.conf file in this folder to insert your own path to the folder in which the template is installed. For example /[YOUR_OWN_PATH]/mbcharts might typically be '/var/www/html/pws/mbcharts'.

* You will also find a folder called 'copy_files_inside_to_user_folder'. Copy the files inside, stats.py and lastrain.py, into your weewx/bin/user folder.

# IMPORTANT

* Once complete and everyting is saved, please restart weeWX.

You can now test that the template is working by opening it up in your browser. Initially you will see random demo data. Click on the menu button at the top-left corner and select settings. This will open up a web form in which you apply your own settings. Pay particular attention to the location of the realtime.txt file being generated on a loop cycle by weeWX. The default location is “/[html_root]/weewx/realtime.txt” (for example /var/www/html/weewx/realtime.txt).

For an in depth guide on configuring a remote server please refer to 'taylormia_remote_server_setup.pdf'

Finally re-start weewx and refresh your browser and you should see your own live weather station data. If things go wrong, check your settings carefully ensuring that the realtime.txt file and API keys and tokens have been correctly entered. 

If you have any issues please raise directly with steepleian@gmail.com.
