# Imagen base
FROM nginx:latest

# Copiar plantilla de configuración de Nginx
COPY nginx.conf /etc/nginx/nginx.conf