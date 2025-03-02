# Utilitzem la imatge oficial de NGINX
FROM nginx:alpine

# Copiem la configuració personalitzada
COPY nginx.conf /etc/nginx/nginx.conf

# Exposem el port 8080
EXPOSE 8080

CMD ["nginx", "-g", "daemon off;"]