FROM nixpkgs/nix:latest

# Install PHP, Composer, Node.js, Nginx, dan extensions
RUN nix-env -iA \
    nixpkgs.php83 \
    nixpkgs.php83Extensions.intl \
    nixpkgs.php83Extensions.zip \
    nixpkgs.composer \
    nixpkgs.nodejs_20

WORKDIR /app

# Copy semua file project
COPY . .

# Install dependencies PHP & Node
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs
RUN npm ci
RUN npm run build

# Expose port
EXPOSE 8080

# Jalankan Laravel
CMD ["php", "artisan", "serve", "--host", "0.0.0.0", "--port", "8080"]
