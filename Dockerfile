FROM ubuntu:20.04
ENV TZ=America/Mexico
ENV DEBIAN_FRONTEND=noninteractive
EXPOSE 80
EXPOSE 8000
RUN apt-get update && apt-get install tzdata sudo
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
RUN echo "docker ALL=(ALL) NOPASSWD: ALL" >> /etc/sudoers
RUN useradd -m docker && echo "docker:docker" | chpasswd && adduser docker sudo
USER docker
RUN sudo apt-get install -y curl php nginx php-gd php-zip php-fpm php-mysql php-mbstring php-xml composer unzip 
COPY . /home/docker
WORKDIR /home/docker
RUN mv .env.example .env
RUN sudo composer install
RUN sudo composer require laravel/passport "^9.0"
RUN sudo composer require maatwebsite/excel
RUN sudo php artisan key:generate
RUN sudo chmod a+x onRun.sh
RUN sudo chmod -R 777 storage
RUN sudo chmod -R 777 bootstrap/cache
CMD ./onRun.sh 