Demo for ["Rock template"](https://github.com/romeOz/rock-template)
====================

Used Vagrant + Ansible.

###Out of the box:

 * Ubuntu 14.04 64 bit

> If you need to use 32 bit of Ubuntu, then uncomment `config.vm.box_url` the appropriate version in the file [Vagrantfile](https://github.com/romeOz/vagrant-rock-template/blob/master/Vagrantfile).

 * Nginx 1.6
 * PHP-FPM 5.6
 * Composer
 * For caching
    * Memcached 1.4.14 + php5_memcached, php5_memcache
    * Couchbase 3.0.0 + pecl couchbase-1.2.2 **(option)**
    * Redis 2.8 + php5-redis **(option)**
 * Local IP loop on Host machine /etc/hosts and Virtual hosts in Nginx already set up!
> To run all services marked `option` you should to uncomment them in the file [main.yml](https://github.com/romeOz/vagrant-rock-template/blob/master/provisioning/main.yml).

Installation
-------------------

1. ```git clone https://github.com/romeOz/vagrant-rock-template.git```
2. [Install Vagrant](https://www.vagrantup.com/downloads), and additional Vagrant plugins ```vagrant plugin install vagrant-hostsupdater vagrant-vbguest vagrant-cachier```
3. ```vagrant up```
4. Open demo [http://rock.tpl/](http://rock.tpl/) or [http://192.168.33.34/](http://192.168.33.34/)

> Work/editing the project can be done via ssh:

```bash
vagrant ssh
cd /var/www/rock-template
```

Changelog "Rock template"
-------------------
 * [Release 0.9.2](https://github.com/romeOz/rock-template/releases/tag/0.9.2)
 * [Release 0.9.1](https://github.com/romeOz/rock-template/releases/tag/0.9.1)
 * [Release 0.9.0](https://github.com/romeOz/rock-template/releases/tag/0.9.0)

License
-------------------

The Demo for ["Rock template"](https://github.com/romeOz/rock-template) is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)