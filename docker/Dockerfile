FROM ubuntu:latest
RUN rm /bin/sh && ln -s /bin/bash /bin/sh
RUN apt-get update; \
apt-get install -y build-essential; \
apt-get install -y openjdk-7-jre; \
apt-get install -y mysql-server; \
apt-get install -y curl; \
apt-get install -y unzip; \
apt-get install -y apache2; \
EXPOSE 30000

