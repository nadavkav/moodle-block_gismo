===================================================================================
                                      G I S M O
                    
                          Version 3.1.1 - June 18, 2013 
	
		
		Università della svizzera italiana, Lugano, Switzerland
                    
                                       README
===================================================================================

0)  Requirements

    Gismo is primarily developed on the LAMP platform (Linux, Apache, MySQL and 
    PHP), we didn't test it in Windows environments.

    The requirements for Gismo are:
    - PHP v. 5.3 (it should work with previous versions of php if you install
      PECL JSON >=1.2.0, but we didn't test it).
    - Database (one from the list of those supported by Moodle)
    - Moodle 2.3.x or 2.4.x or 2.5.x

    WARNING: Gismo has been tested on Mysql (v. 5.5.x) and PostgreSQL (v. 8.4.9)

1)  Setup
    
    a) REMOVE OLD VERSION

    Please remove any old version of the plugin.

    b) INSTALL FILES
    
    Please follow the standard procedure to install Moodle plugins:
    - copy the gismo folder into the moodle blocks directory (MOODLE_DOCUMENT_ROOT/blocks)
    - logon to moodle as administrator and visit the Notifications page
    - configure the new settings page

    c) LAUNCH DATA EXPORTER FOR THE FIRST TIME
    
    Gismo needs to perform some computation on regular basis. The purpose of this 
    computation is to extract data from logs and derive aggregated information. 
    
    This computation is done by a script that, depending on the setting of your 
    Moodle cron script, by default it runs during the night between 02.00 and 04.00 (server time)
    but can be changed in gismo setup options.
    When you install the Gismo block the fist time, if you don't want to wait 
    the next day to see the result, you can lunch this script by hand 
    at this address:

    MOODLE_MAIN_URL/blocks/gismo/lib/gismo/server_side/export_data.php?password=yourpassword

2)  Configuration

    Gismo doesn't need any specific configuration. Everything runs out of the box.

3)  Use
    
    Please access your course as teacher and add a Gismo block instance, 
    then follows instructions.  

4)  Further information
    
    Please visit http://gismo.sourceforge.net/ for further information
    
5)  Gismo is released under GPL version 3 License
    
    
The eLab Team
    
===================================================================================