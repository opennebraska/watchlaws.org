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

- [LegiScan](https://legiscan.com/user/register) account *... to get an API key*
- .env *... a copy of the environment file for development*
- PHP *... on a Mac, install **brew** first, then run: `brew install php`*
- [Docker](https://www.docker.com/)
- [Composer](https://getcomposer.org/)
- [Node](https://nodejs.org/en/)

Suggested:

- [VS Code](https://code.visualstudio.com/) or [PhpStorm](https://www.jetbrains.com/phpstorm/)
- [TablePlus](https://tableplus.com/)

Steps:

1. Clone this repo and change into directory
   
2. Install Composer dependencies\
   `composer install`
   
3. Install Node dependencies and run the Vite build\
   `npm install && npm run build`
   
4. Copy the environment file\
   `cp .env.example .env`

5. Generate app key\
   `php artisan key:generate`

6. Add your LegiScan key to the `.env` file

7. Copy the LegiScan config file\
   `cp legiscan.config.example.php legiscan.config.php`

8. Uncomment the states and years in the `legiscan.config.php` file

    ```
    ...
    states[] = NE
    ;states[] = NH
    ...
    years[] = CURRENT
    ;years[] = 2021    
    ...
    ```

9. Build and run sail\
   `./vendor/bin/sail up -d`

10. Link the storage directory\
   `./vendor/bin/sail artisan storage:link`

11. Run the database migration\
   `./vendor/bin/sail artisan migrate`

12. Import the legislative data\
    `./vendor/bin/sail artisan legiscan:import`

13. The local site is ready to view at:&nbsp; `http://127.0.0.1`.\
    Any email sent out is trapped at `http://127.0.0.1:8025`.

    > NOTE:\
    > If you want your browser to be refreshed automatically, whenever you make changes to the files, then run: `npm run dev`.
    >
    > If you want to build the assets for production, then run: `npm run build`.

# Running the server

Start the server:

    ./vendor/bin/sail up -d    # Starts the containers in the background
    npm run dev                # Starts the development watcher

Stop the server:

    Ctrl+C                     # To stop the development watcher
    ./vendor/bin/sail stop     # To stop the containers (running in the background)


Stop the server and remove the volumes (to start fresh):

    ./vendor/bin/sail down -v

# Using LegiScan

Import the legislative data at anytime, using:\
`./vendor/bin/sail artisan legiscan:import`

*See the [LegisCan API Client documentation](https://api.legiscan.com/dl/) for more information.*

# Testing

Run PHPUnit inside the container:\
`./vendor/bin/sail phpunit`
