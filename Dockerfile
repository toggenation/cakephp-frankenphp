FROM dunglas/frankenphp:php8.4

# Be sure to replace "your-domain-name.example.com" by your domain name
ENV SERVER_NAME=localhost
# If you want to disable HTTPS, use this value instead:
#ENV SERVER_NAME=:80

RUN install-php-extensions \
	pdo_mysql \
	intl \
	zip \
	opcache \
	sqlite3

# Enable PHP production settings
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini" && \
	sed -iback 's/^zend\.assertions\s*=\s*-1/zend.assertions = 1/' "$PHP_INI_DIR/php.ini"

RUN apt-get update && apt-get install -y procps && rm -rf /var/lib/apt/lists/*

# Copy the PHP files of your project in the public directory
# COPY . /app

