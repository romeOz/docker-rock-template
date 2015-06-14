Demo for ["Rock template"](https://github.com/romeOz/rock-template)
====================

See Demo (one of three ways)
-------------------

####1. [Destination](http://demo.template.framerock.net/)

####2. Docker + Ansible

 * [Install Docker](https://docs.docker.com/installation/) or [askubuntu](http://askubuntu.com/a/473720)
 * `docker run -d -p 8080:80 romeoz/vagrant-rock-template`
 * Open demo [http://localhost:8080/](http://localhost:8080/)
 
####3. VirtualBox + Vagrant + Ansible

 * `git clone https://github.com/romeOz/vagrant-rock-template.git`
 * [Install VirtualBox](https://www.virtualbox.org/wiki/Downloads)
 * [Install Vagrant](https://www.vagrantup.com/downloads), and additional Vagrant plugins `vagrant plugin install vagrant-hostsupdater vagrant-vbguest vagrant-cachier`
 * [Install Ansible](http://docs.ansible.com/intro_installation.html#latest-releases-via-apt-ubuntu)
 * `vagrant up`
 * Open demo [http://www.rock-template/](http://www.rock-template/) or [http://192.168.33.34/](http://192.168.33.34/)

> Work/editing the project can be done via ssh:

```bash
vagrant ssh
cd /var/www/rock-template
```

License
-------------------

The Demo for ["Rock template"](https://github.com/romeOz/rock-template) is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)