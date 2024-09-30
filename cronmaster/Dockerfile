FROM alpine:3.8

# Configure cron echo "abc"
COPY . /usr/local

# Init cron
RUN /usr/local/startup.sh

CMD ["crond", "-f"]