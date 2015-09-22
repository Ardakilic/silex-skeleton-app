# silex-skeleton-app
A sample [Silex](http://silex.sensiolabs.org/) skeleton app that has command support (based on [Symfony Console](http://symfony.com/doc/current/components/console/introduction.html)), [Guzzle](https://github.com/guzzle/guzzle) as HTTP client, Laravel's Fluent Query Builder and Eloquent ORM ([[1](https://github.com/illuminate/database)], [[2](http://laravel.com/docs/5.1/queries)], [[3](http://laravel.com/docs/5.1/eloquent)]), and [PHPMig](https://github.com/davedevelopment/phpmig) as migration handler.

Also, if it's installed with dev-dependencies, [Whoops](http://filp.github.io/whoops/) and [Symfony VarDumper](http://symfony.com/doc/current/components/var_dumper/introduction.html) is also installed.

##Installation
* Clone the repository
* Set your web root into the `public` path and redirect all the requests into `public/index.php` file. You can refer to [here](http://silex.sensiolabs.org/doc/web_servers.html) for Web Server configuration.
* Copy `app/config.sample.yml` to `app/config.yml`, set your timezone and fill your database credentials,
* Navigate to your app or run the command.
* Start developing! :smile:

**Note:** After installation, don't forget to check suggestions!


##Contributing

* Fork the repository 
* Do your magic
* Create a pull request

**Please feel free to post your suggestions and pull requests!**


*This repository is created while authoring the following article:*

[https://arda.pw/using-eloquent-and-schema-builder-commands-outside-laravel/](https://arda.pw/using-eloquent-and-schema-builder-commands-outside-laravel/)


