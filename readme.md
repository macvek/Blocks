# General
Blocks is a framework which I built for my everytime 'ideas' which are for here and now to be developed.
They can be small, but must be rapid. I often hit moments when I already had something developed in other project, but it lacked of integration,
so I had to dig down and connect all wires back. It was a waste of time. So here I want to wrap it all up with all good practices I've found from the past

## How to work with it: 
* Close this repository
    * don't overwrite code which is already here (if you want a swift update)
* create a directory next to 'private' - with your code
* change index.php to call your entry page like 'MyWelcomePage' from default 'WelcomePage'
* add entry to your directory in bootstrap.inc.php (or uncomment BestProject and just rename it)
    * same for tests, just fill extra entries in lines after 'place for custom callSuite'

## This code is based on few conventions
* It uses MVC+S for server side generated code
    * Model - it is just all public fields class
    * View - it is a class which accepts 'render' method optionally type checking Model class
    * Controller is the class which gets a request forwarded to and return pair of instances of (Model, View)
    * +S - stands for - only Controllers can call Services, and so Services do any logic and assume user is already authorized to call such operation
* It uses plain javascript for client code
    * So it requires no compilation;
    * It favours simplicity
    * It has minimalistic framework for AJAX, which can be duplicated by any other framework
    * It motivates to use browser features instead of frameworks features

# Deployment
Either pack it to docker (check current samples in DevScripts) so you can use it the same as for development (wwwServers.ps1),
or deploy content of 'www' directory and pick www/html as a public directory for you page.

'www/html/includes/bootstrap.inc.php' has the only classloader and it has only few lines, so you can also modify this file to tune it for your setup.

# Architecture
* Classes are held in one big single namespace with only name prefixes applied
* Classes files have convention of XYZ.class.php for classes
* Include files (if you ever need it?) use convention of XYZ.inc.php
* Classes with a *Page suffix, like WelcomePage are the only examples of 'run me and render' classes; all other should be accessed via Router
* Classes accessed via Router are Controllers, using convention *Controller, like IndexController
* By default Router is accessed via router.php?c=... - but it can be changed using number of ways, up to developer to pick
    * Router creates instance of Controller
    * Call such instances method controller() -- with no arguments
    * Expects pair of (Model, View) instances
    * Calls View->render(Model) -- this delegation to 'Router' is for sake of keeping testable design
        * For rendering json, there is already a predefined JsonView class which puts Model to json_encode


# Good practices
* Class names are named using Pascal Case ( UpperCamelCase) , like WelcomeHomeView, not welcomeHomeView, not welcome_home_view.
* Include files are using ONLY lowercases and must have .inc.php suffix, so they won't be accidentally treated like class
* String concatenation must be lowered to minimum, especially for places which are searchable, 
    * If you use key word like registermail_title, DON'T create such key prior to creating email, like $nameMail."_title" as it will block you from finding occurance of "registermail_title" in project search
* In case you use the same value in multiple places, try to put it into 'constants only class', so it is easy to find in source code