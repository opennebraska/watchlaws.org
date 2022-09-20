# WatchLaws.org

The goal is to help nonprofits:

- work with other nonprofits and everyday citizens, 
- to quickly identify the bills being proposed that are important to them,
- and a way to engage their members and everyday citizens to get involved.

Also, the goal is to help everyday citizens:

- understand the lawmaking process in their state,
- learn about the critical times to be engaged as a citizen,
- and find and monitor the bills that are important to them.

# The Need

Many nonprofits want their members to call their representative, or speak at an open hearing at the state capital, but it's not easy. It takes time to educate members on certain laws being proposed, and why they should care about them. Then, for an open hearing, the catch is you have to know exactly WHEN and WHERE to do be, and many times you are given only a week's notice. This is a lot for nonprofits to manage. 

In addition, most citizens don't jump into something on the first day. They need to learn why they should care about something, and what steps they need to take well in advance. 

Everyday citizens and nonprofits need a way to gather around laws being proposed well in advance of when their involvement is needed.

# Technology

The legislative data is imported from [LegiScan](https://legiscan.com/) using their API Client.

This system is using the TALL stack:

- [Tailwind](https://tailwindcss.com/) (CSS)
- [Alpine](https://alpinejs.dev/) (JS)
- [Livewire](https://laravel-livewire.com/)
- [Laravel](https://laravel.com/) (PHP)


# Installation

Requirements:

- .env *... a copy of the environment file for development*
- PHP *... on a Mac, install brew first, then run: `brew install php`*
- [Docker](https://www.docker.com/)
- [Composer](https://getcomposer.org/)
- [Node](https://nodejs.org/en/)

Suggested:

- [VS Code](https://code.visualstudio.com/) or [PhpStorm](https://www.jetbrains.com/phpstorm/)
- [TablePlus](https://tableplus.com/)

Steps:

1. Clone the repo and change into directory
   
2. Install Composer dependencies\
   `composer install`
   
3. Install Node dependencies\
   `npm install`
   
4. Copy `.env` file into main directory
   
5. Generate app key\
   `php artisan key:generate`

6. Build and run sail\
   `./vendor/bin/sail up -d`

7. Link the storage directory\
   `./vendor/bin/sail artisan storage:link`

8. Create database in Docker container *... see `.env` file for connection info*

9.  Run the database migration:\
   `./vendor/bin/sail artisan migrate`

9. Configure the states for bulk import\
   `~/_legiscan.config.php`

10. Import some records from legiscan\
    `./vendor/bin/sail artisan legiscan:import`

11. Go to your localhost (127.0.0.1) in a browser
    
12. When finished, stop the container\
    `./vendor/bin/sail stop`
