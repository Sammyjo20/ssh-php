<div align="center">

# 🤫  _`SSH PHP` !_

### The ridiculously simple framework for building PHP SSH apps! 🔥

<img width="974" alt="Screenshot 2024-07-26 at 18 09 49" src="https://github.com/user-attachments/assets/cdecc8fb-ba0f-4c0d-8aff-9e43f539f3f3">

</div>

> This project is in early access, and I'm quite new to Docker so please consider contributing if you think this could be improved! Please share your thoughts in the issues/discussions. Thank you!

## What the shell?!

I know right! I've just ran `ssh localhost` and I've got a full PHP application running in my terminal?! What! Me too. When I first saw [Joe Tannenbaum's](https://joe.codes/) Tweet where he showed off his awesome `ssh cli.lab.joe.codes` I thought to myself, I had to get this working myself. I have a secret project that I'm currently working on but during my research I managed to adapt his guide for getting [charmbracelet/wish](https://github.com/charmbracelet/wish) running with PHP to work with Docker!

## Why?
This is mainly for building [TUIs](https://en.wikipedia.org/wiki/Text-based_user_interface) however it can run any PHP script so you can build cool forms, resumes or anything you desire!

## Why Docker?

Well, messing around with SSH is not really something I want to do to my servers. Additionally, if I'm going to have the public **SSH into my server** I'm going to want to make sure it's ring-fenced. With a Docker container, it's even more ring-fenced then just SSHing directly into the server.

## Requirements
- PHP 8.3 (Installed locally)
- Docker

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
- [Joe Tannenbaum - Hacking Laravel Prompts For Fun & Profit](https://laravel.com/docs/11.x/prompts#main-content)
- [Joe Tannenbaum - Building TUIs Gotchas & Good Info](https://blog.joe.codes/building-tuis-gotchas-and-good-info)
- [Laravel Prompts Documentation](https://laravel.com/docs/11.x/prompts#main-content)
- [joetannenbaum/chewie Documentation](https://github.com/joetannenbaum/chewie)

### Running the script during development
During development, it's recommended to run the script with the following command:

```
php ./src/index.php 
```

### Running the SSH server
Obviously you're going to want to see the SSH server right before your eyes! You can do this by running the following command.

```
composer run-dev
```
This will run the SSH server in your terminal window. In another window you should be able to run the following command

```
ssh localhost -p 2201
```

# Deploying to production

### Credits

- Huge thanks to [Joe Tannenbaum's](https://joe.codes/) for his awesome [blog post](https://blog.joe.codes/creating-ssh-apps-with-charm-wish-and-laravel-prompts) and his support via Twitter/X DMs!
