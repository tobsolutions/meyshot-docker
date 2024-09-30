FROM alpine:3.8

# Configure cron
COPY . /usr/local

# Init cron
RUN /usr/local/startup.sh

CMD ["crond", "-f"]