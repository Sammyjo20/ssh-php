<div align="center">

# 🤫  _`SSH PHP` !_

###  Ridiculously simple PHP SSH apps! 🔥

<img width="974" alt="Screenshot 2024-07-26 at 18 09 49" src="https://github.com/user-attachments/assets/cdecc8fb-ba0f-4c0d-8aff-9e43f539f3f3">

</div>



> This project is in early access, and I'm quite new to Docker so please consider contributing if you think this could be improved! Please share your thoughts in the issues/discussions. Thank you!

# What the shell?!

I know right?! I've just ran `ssh localhost` and I've got a full PHP application running in my terminal?! What! Me too. When I first saw [Joe Tannenbaum's](https://joe.codes/) Tweet where he showed off his awesome `ssh cli.lab.joe.codes` I thought to myself, I had to get this working myself. I have a secret project that I'm currently working on but during my research I managed to adapt his guide for getting [charmbracelet/wish](https://github.com/charmbracelet/wish) running with PHP to work with Docker!

# Why Docker?

Well, messing around with SSH is not really something I want to do to my servers. Additionally, if I'm going to have the public **SSH INTO MY SERVER** I'm going to want to make sure it's ringfenced. With a Docker container, it's even more ringfenced then just SSHing directly into the server.

# Get Started

### Docker Compose
At the time of writing, the easiest way to get started with _ssh php_ is to clone this repository and run `docker compose up -d`. This should be all you need to get started, and you will then be able to run `ssh localhost -p 2201`.

You can modify the `index.php` file in `src/php/index.php`. This should update in realtime, you'll just need to exit out of the SSH terminal and load it again for it to work.

> Note you should keep the `data/.ssh` folder because this contains the containers's SSH key, if you delete this you won't be able to SSH into the container. If this happens you can remove the server from your `~/.ssh/known_hosts` file.

### Credits

- Huge thanks to [Joe Tannenbaum's](https://joe.codes/) for his awesome [blog post](https://blog.joe.codes/creating-ssh-apps-with-charm-wish-and-laravel-prompts) and his support via Twitter/X DMs!
