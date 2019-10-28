# Home Weather Station weather website template for WeeWX versions 3.9.0 or later

This repository contains the current WeeWX version of Brian Underdown's Home Weather Station weather website template set. Brian's main website is https://weather34.com/homeweatherstation/index.html In January, 2019, Brian asked others to distribute/maintain his code. 

This version requires WeeWX version 3.9.0 or later software with the CRT extension to denerate data feeds for the conditions from your personal weather station. WeeWX is available at http://weewx.com

This version is designed explicitly to harness the powerful WeeWX database to generate the weather data charts and statistical data. It is built on the current MB-UB40-RRW which is now maintained by Lightmaster (Meteobridge-Weather34-Template). A key metric for this project is to maintain design, functional and performance parity with the MB-UB40 parent. Although not an absolute guarantee, the aim is to update WX-HWS within 24 hours of the parent being updated.

If you are happy to use Weather Underground as a source of data for chart generation you are strongly recommended to use the Ken True CU-HWS version (https://github.com/ktrue/CU-HWS) as your first choice which can be configured out-of-the-box to be used with WeeWX.

# What's New in this Version WX-HWS-UB40-RRW

Built on the current Meteobridge Version MB-UB40-RRW giving an identical experience.

Latest design features.

New w34 skin

Harnesses the power of the WeeWX database to generate graphs and statiscal data.

New style pop-up weather almanacs.

Rainfall almanac reflects rain year settings in weewx.conf file.

Introduces the concept of a WeeWX-api.

Meteobridge to WeeWX variable look-up table.

New addition charts.

New addition wind map.

New addition pop-up window links now visible in phone mode.

Auto adjusting pop-up windows for better viewing experience on smart phones and smaller tablet devices.

Enhanced chart freatures.

Dark or light chart colour theme (set by Default Theme Colour in Settings).

Choice of 24hr 12hr station main clock.

# Important  for those using Weather Underground for chart data, unfortunately this is no longer supported. This is not a template issue, the issue lies with Weather Underground and it looks like they may have discontinued this facility. If it returns in some form it may be possible to use again but it will have to be a tried and tested feature of Weather Underground before re-introducing it into the template.

# Demo

A live example of WX-HWS template can be seen at https://claydonsweather.org.uk

# Weather34 Historic Timeline of design 2014-2019 
https://weather34.com/homeweatherstation/weather34timeline/weather34timeline.html

# Template Screenshot
<p align="center">
  <img src="https://res.cloudinary.com/brian-underdown/image/upload/v1553679424/weather34_meteobridge2019_bzq4sa.png" width="550" title="weather34 meteobridge template ">
 
</p>

<p align="center">
  <img src="https://res.cloudinary.com/brian-underdown/image/upload/v1557158225/almanacs_m5vmum.jpg" width="550" title="weather34 meteobridge alamanacs ">
 
</p>

# Setup

Follow the instructions in the 'installation guide' (INSTALLATION_GUIDE.md) to install the template.
Browse to http://your.website/easywxsetup.php
There is no initial password when the page prompts the first time -- just press LOGIN to enter the page.
IMPORTANT set a password in the screen for future use -- your browser can remember it. This will make future updates    reasonably secure so only you can do the updates to the configuration.
Make setting entries in the easyweathersetup.php page and SAVE. The next time you run it, use the password you set in the step above.
Repeat running easywxsetup.php until the main screen appears as you like it.

# Diagnostics

A new utility diags.php was added to the distribution. It is useful for checking the installation of the WX-HWS template and showing (safely) the current settings.php/settings1.php file contents for debugging. Note: the entries for $password, $db_user, $db_pass are replaced with '********' to avoid unwanted disclosure of private information.

    run diags.php?show=info on your website to show the key info about the WX-HWS installation and required PHP function status
    run diags.php?show=settings on your website to safely show the current settings.php and settings1.php contents

# License

Copyright (c) 2016-2019 by Brian Underdown (https://weather34.com)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the “Template”), to deal in the Template without restriction, including without limitation the rights to, can use, can not copy without prior permission, can modify for personal use, can use and publish for personal use ,can not distribute without prior permission, can not sublicense without prior permission, and can not sell copies of the Template, and subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Template.

THE TEMPLATE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NON INFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE TEMPLATE OR THE USE OR OTHER DEALINGS IN THE TEMPLATE.

Attribution-NonCommercial 4.0 International based on a work at https://weather34.com/homeweatherstation
Non-weeWX versions Available

# An Excerpt from Meteobridge-Weather34-Template MB-UB40-RRW README.md
Github repository for the Meteobridge version of the original weather34 template 
Weather Template for Meteobridge users only 

# This work is not permitted to be used in any other versions without prior permission unless listed below 
# Permission is granted for use in Cumulus version maintained by Ken True 
# Permission is granted for use in Weewx version maintained by Ian Millard

*This work means CSS/SVG/PHP .

Meteobridge Version available via download maintained by Lightmaster (https://github.com/lightmaster/Meteobridge-Weather34-Template)

Cumulus Version available via download and more info supported by Ken True ( https://github.com/ktrue/CU-HWS ). This version now also supports WeeWX and WeatherCat


Apart from Brian Underdown without him, this template would never exist, I would aslo like to acknowledge the following people: -

Ken True for sharing files and who makes my job of maintaining the weeWX version so much easier.

Thomas Sosio for his invaluable contribution in producing the Meteobridge lookup code to translate WeeWX database output.

David Marshall for contributing technical knowledge and solutions to create the wxchart .tmpl files and alternative solutions for weather alerts.

Lightmaster who now maintains the parent Meteobridge-Weather34-Template.

Taylormia for contributing his excellent setup example for instances where weeWX and server/template are remote to each other.

Gary Portellas for a helpful suggestion to further simplify the installation process.

Jake aka Jerry, work on JS conversion script for error free more efficient unit conversion for CanvasJS charts.

All those unamed people who have helped me with testing updates

# Alternative versions

# Meteobridge
you can find the Meteobridge version maintained by Lightmaster (William) at 
https://github.com/weather34/Meteobridge-Weather34-Template34/

# Cumulus
you can find the Cumulus version maintained by Ken True (Saratoga) at 
https://github.com/ktrue/CU-HWS

# Weewx
you can find a Weewx version maintained by Ian Millard is also avaialble via 
https://github.com/steepleian/WX-HWS

# Weatherflow
you can find a Weatherflow version not maintained but fully tested as of May 5th 2019 
https://github.com/weather34/Weather34-Weatherflow


# This work is licensed under a Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International License.
http://creativecommons.org/licenses/by-nc-nd/4.0/

# Credits and thanks to the contributors who made this all possible since 2015.

 Erik M Madsen for language idea and initial script
 
 Paul @komoka weather in Canada for continous support and testing 
 
 Josep for Spanish/Catalan language translation and for many ideas and refinements
 
 Pascal Catte French translation and ideas fowarded 
 
 Steve the developer of Cumulus for support and providing a platform to resolve issues 
 
 Mats Ahlklo Swedish translation and his work on using Davis weatherlink 
 
 Betejuice (Cumulus Forum) for providing a solution for meteor shower listings 
 
 Ken True (Saratoga) for kindly granting permission allowing use of many scripts he developed which gave inspiration and ideas  though not used today it was the inspiration that allowed to do something more suited to the design. 
 
 Eric Rechlin Special thanks for originally creating the theme switching and extensive work on metrics/non metrics
 
 Boris at smartbedded (meteobridge) for ongoing support and upkeep of meteobridge 
 
 Wim van der Kuil for the original meteobridge script 
 
 David St John at weatherflow for providing hardware for testing and his non bias logical views 
 
 Paul Wilman , Tina Thomas, Vaggos , Chuck M , Aaron Gersztoff , Ian Millard, and many many more for continous constructive supportive feedback .. 
