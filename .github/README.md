<div align="center">

# 🤫  _`SSH PHP` !_

### The ridiculously simple starting point for building PHP SSH apps! 🔥

<img width="974" alt="Screenshot 2024-07-26 at 18 09 49" src="https://github.com/user-attachments/assets/be2d197d-b574-418d-9a6d-76d3b3d4b667">

</div>

## What the shell?!

I know right? I've just run `ssh localhost` and I've got a full PHP application running in my terminal?! What! Me too. When I first saw [Joe Tannenbaum's](https://joe.codes/) Tweet where he showed off his awesome `ssh cli.lab.joe.codes` I thought to myself, I had to get this working myself. I have a secret project that I'm currently working on but during my research, I managed to adapt his guide for getting [charmbracelet/wish](https://github.com/charmbracelet/wish) running with PHP to work with Docker!

This is project is mainly for building [TUIs](https://en.wikipedia.org/wiki/Text-based_user_interface) however it can run any PHP script so you can build cool forms, resumes or anything you desire!

## Why Docker?

Well, messing around with SSH is not something I want to do to my servers. Additionally, if I'm going to have the public **SSH into my server** I want to make sure it's ring-fenced. With a Docker container, it's even more ring-fenced then just SSHing directly into the server.

## Live Demo
Want to see how it looks yourself? I've deployed this repository to a Hetzner Cloud server which is just running Docker.

```
ssh yeehaw.dev
```

## Requirements
- PHP 8.3 (Installed locally)
- Docker

> This project is in early access, and I'm quite new to Docker so please consider contributing if you think this could be improved! Please share your thoughts in the issues/discussions. Thank you!

## Installation

To get started, run the following Composer `create-project` command. Make sure to rename the `ssh-app-name` to the name of your project.

```
composer create-project sammyjo20/ssh-php ssh-app-name
```

After the command has been run, enter the directory it just created.

## Getting Started
You will have the following directory structure. Here is an explanation of all the important files.

```
.
├── .docker            # Where the SSH keys for your Docker container are stored.
├── .github            # Contains workflows for running tests, PHP Stan and Code Style Fixers.
├── src                # Your application's source files
├── tests              # Automated tests (PEST)
├── docker-compose.yml # This file will be used to deploy your application to production.
└── Dockerfile         # This file allows you to customise the production image.
```
You may choose to keep the tests and the `.github` folder. If you don't use/need code style or PHP stan these can be uninstalled by removing them from `composer.json` and running `composer update`.

### Building your SSH TUI (Terminal UI)
Now you have a great baseline for building your SSH TUI, go build something awesome.

In the `src` directory, you will find an `index.php` file. This file is the entry point for your SSH app. You can choose to do anything you like with this. This template has pre-installed [laravel/prompts](https://github.com/laravel/prompts) and [joetannenbaum/chewie](https://github.com/joetannenbaum/chewie) to demonstrate how it can be used.

You may also consider installing `nunomaduro/termwind` which is a fantastic tool that lets you write HTML in the terminal.

Here are some useful resources for getting started:
- [Joe Tannenbaum - Hacking Laravel Prompts For Fun & Profit](https://blog.joe.codes/hacking-laravel-prompts-for-fun-and-profit)
- [Joe Tannenbaum - Building TUIs Gotchas & Good Info](https://blog.joe.codes/building-tuis-gotchas-and-good-info)
- [Laravel Prompts Documentation](https://laravel.com/docs/11.x/prompts#main-content)
- [joetannenbaum/chewie Documentation](https://github.com/joetannenbaum/chewie)

### Running the script during development
During development, it's recommended to run the script with the following command:

```
php ./src/index.php 
```

### Running the SSH server
Obviously, you're going to want to see the SSH server right before your eyes! You can do this by running the following command.

```
composer run-dev
```
This will run the SSH server in your terminal window. In another window, you should be able to run the following command

```
ssh localhost -p 2201
```

### Installing additional PHP extensions
You may need to add additional extensions to get your server to work in production. You can do
this by modifying the `Dockerfile` in the root directory. The base image runs Alpine Linux and
has a few common PHP extensions, however you can add more here if you need.

```
RUN apk add php-redis
```

## Deploying to production

### Requirements
Your server must have Docker installed.

### Configuring Everything
Firstly, copy the `docker-compose.yml` file to `docker-compose.prod.yml` and open it up. Inside here, change the ports from `2201:22` to `22:22`. This will mean on production your app will run on the regular SSH port.
You may also need to define the platform to build on.

### Changing the default OpenSSH port on your server
Next, we're going to need to change the OpenSSH port on your server to something other than `22`, because that's what our application will be running on. On your server run:

```
sudo nano /etc/ssh/sshd_config
```

Look for the line that starts with Port. It may be commented out, go ahead and uncomment it. Change it to whatever number you'd like (and is available), for example 2201. Then restart the service with the following command

```
sudo service ssh restart
```

Now you want to update your firewall rules to ensure that the port is not blocked. Depending on which firewall you are using, this may be different for you. For ufw:

```
sudo ufw allow 2201/tcp
```
> [!CAUTION]
> Important: Before you log out of the server or close that terminal tab, open a new terminal and make sure you can access your server via SSH. If it doesn't work you will be locked out of your server, so remaining logged in in the original tab will allow you to remedy any issues.

Next time you need to SSH into your server you can specify the custom port.

```
ssh user@your-server -p 2201
```

If you're using [Laravel Forge](https://forge.laravel.com) on this server, make sure you change the port that Forge connects to the server with under Settings > Server Settings > SSH Port.

### Clone your project onto the server
Make sure you commit your `docker-compose.prod.yml` file and then deploy the whole project to your server.

### Deploy time!
Now you can run the following command on your server. Run the following `./deploy.sh` script.

If it is the first time running the above deploy script, you may need to make it executable.

```
chmod u+x ./deploy.sh
```

```
./deploy.sh
```
> If you are using Laravel Forge, you can add this to your deployment script to automatically update the SSH app.

It's completely normal for this command to exit after running. If you want to check that the Docker container is running, you can run the following command

```
docker ps
```
## And that's it! ✨
Now you can SSH into your server `ssh your-server-ip` and you should see your awesome PHP application! You can even point your DNS to the server IP and use that too if you like.

```
ssh your-server-ip
```

## Support
If you found this project useful, please consider sponsoring me either one time or a regular sponsor. This helps pay me for my time maintaining and keeping projects like these active. You can sponsor me on GitHub by [clicking here](https://github.com/sponsors/sammyjo20).

## Credits
- Huge thanks to [Joe Tannenbaum's](https://joe.codes/) for his awesome [blog post](https://blog.joe.codes/creating-ssh-apps-with-charm-wish-and-laravel-prompts) and his support via Twitter/X DMs!

## Security
If you find any security related issues, please send an email to 29132017+Sammyjo20@users.noreply.github.com
