# Installation Guide

This installation guide assumes that you are already reasonably familiar with WeeWX and that it is already installed on your computer along with a webserver, php and curl. For a light-touch webserver, Lighttpd is a good choice. A good guide for installing PHP 7.0 and Lighttpd on a RaspberryPi can be found at https://pimylifeup.com/raspberry-pi-lighttpd/

If you are carrying out a fresh install of WeeWX, you are strongly recommended to use the setup.py method (http://www.weewx.com/docs/setup.htm)

* Please familiarise yourself with the location of your WeeWX system files including your bin/user folder, skins folder and weewx.conf file. If you are unsure where to find these, please refer to the installation process here: - http://www.weewx.com/docs/ which shows various WeeWX installation scenarios.

IMPORTANT. After installing PHP please make sure you install all the PHP modules appropriate for your version of PHP. Failure to due so may mean that forecasts and current conditions fail to update. This is an example for PHP7.3 modules on a Debian based distribution: -

	apt-get install php7.3-curl php7.3-dev php7.3-gd php7.3-mbstring php7.3-zip php7.3-mysql php7.3-xml

* Install PyePhem (https://rhodesmill.org/pyephem/). Typically for a Debian based distro use 'sudo apt-get install python-ephem'


Once completed, make sure you save weewx.conf

* If you have have the crt extension (Cumulus Real-Time) extension installed, remove it now. (sudo ./wee_extension --uninstall crt)


* Download the current version of WX-HWS-master zip file at https://github.com/steepleian/WX-HWS to your bin folder (/home/weewx/bin for a setup.py install or /usr/bin for a DEB install).

* From the command line run the following code: -

		cd /home/weewx/bin (or cd /usr/bin)
		sudo ./wee_extension --install WX-HWS-master.zip
		
* After installation edit the weewx-conf file. Go to the  [Weather34RealTime] stanza which will likely be near the end of the script. If your path to your web root is different from below, please amend the path in front of 'weewx/weather34/w34realtime.txt' accordingly.

		[Weather34RealTime]
    			filename = /var/www/html/weewx/weather34/w34realtime.txt
    			unit_system = METRIC
			binding = loop
			
* Once completed, make sure you save weewx.conf
			
* Restart WeeWX.

* After around 5min your should find that folder the weather34 folder has been created in the weewx folder. [your_path]/weewx/weather34 will now be the location of the Weather34 skin in your web server.

* Stop WeeWX and change all files and folders recursively in the root of your server to 0775 using CHMOD and user to your Linux login name and groups to www-data using CHOWN, either via the CLI or your server Control Panel (if you employ one). I use Webmin http://www.webmin.com/deb.html, an open source control panel which will make your tasks much easier.

# IMPORTANT

* Restart weeWX.

* You can now test that the template is working by opening it up in your browser. Initially you will see random demo data. Click on the menu button at the top-left corner and select settings. This will open up a web form in which you apply your own settings. Pay particular attention to the location of the w34realtime.txt file being generated on a loop cycle by weeWX. The default location is “/[html_root]/weewx/weather34/realtime.txt” (for example /var/www/html/weewx/weather34/realtime.txt).

* For an in depth guide on configuring a remote server please refer to 'taylormia_remote_server_setup.pdf'

* Finally re-start weewx and refresh your browser and you should see your own live weather station data. If things go wrong, check your settings carefully ensuring that the w34realtime.txt file and API keys and tokens have been correctly entered. 

* If you have any issues please raise directly with steepleian@gmail.com.
