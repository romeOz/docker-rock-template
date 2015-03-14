FROM ubuntu:trusty
MAINTAINER romeOz <serggalka@gmail.com>

RUN	\
	# Update packages list, upgrade installed packages
	apt-get -y update && \
	apt-get -y upgrade && \
	apt-get install -y software-properties-common

RUN \
	# Add repositories
	apt-add-repository -y ppa:ansible/ansible  && \
	apt-get -y update

# Install ansible
RUN apt-get install -y ansible 

# Add playbooks to the Docker image
ADD ./ /var/www/rock-template/
WORKDIR /var/www/rock-template/

# Install ansible-playbook
RUN ansible-playbook -v provisioning/docker.yml -i 'docker,' -c local

# Append "daemon off;" to the beginning of the configuration
#RUN echo "daemon off;" >> /etc/nginx/nginx.conf

# php-fpm config
#RUN sed -i -e "s/;daemonize\s*=\s*yes/daemonize = no/g" /etc/php5/fpm/php-fpm.conf

# Install supervisor
RUN apt-get install -y supervisor
RUN mkdir -p /var/log/supervisor

ADD ./provisioning/supervisord.conf /etc/supervisor/conf.d/

EXPOSE 22 80

#CMD ["nginx", "-g", "daemon off;"]
#CMD ["php5-fpm"]
#CMD nginx -g 'daemon off;' & php5-fpm --nodaemonize &
CMD ["/usr/bin/supervisord"]