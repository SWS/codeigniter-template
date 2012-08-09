codeigniter-template
====================

Template for CodeIgniter installation with models, views and controllers used by the Studious team.

This is a composition of CodeIgniter that makes a number of changes as preferred by myself for a quicker CodeIgniter installation. This has nothing to do with the official CodeIgniter project and is rather just a customisation based upon personal preferences. Placed on GitHub in case someone else might find a use for it.

Below is a list of the changes made within CodeIgniter Template.

##Backend
* CodeIgniter 2.1.1 installed.
* Application and System folders moved behind a 'html' directory, which would be a webroot (for security).
* .htaccess to remove the need for index.php in URLs.
* .htaccess that adds 'www.' to URLs.
* Encrypted sessions and database storage of sessions enabled (with IP and User Agent matching also enabled).
* Global XSS filtering enabled.
* Compressed output enabled.
* Libraries autoloaded: database, session.
* Changed database controller to mysqli, turned off pconnect.
* Helpers autoloaded: url.
* Form_validation configuration file for centralised storage.
* Users controller as default route.
* Bcrypt library for hashing of passwords.

##Frontend
* HTML5 compliant layout.
* jQuery hosted from Google APIs.
* Bootstrap 2.0.4 responsive with complete JavaScript library.
* Code for apple-touch-icon and favourite icon.

###Todo
* Take some hints from the HTML5 boilerplate project.
* Implement scaffolded models, views and controllers for quick development.