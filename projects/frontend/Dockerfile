FROM node:16.19.0

WORKDIR /var/www/html/frontend

COPY package*.json ./

RUN npm install
RUN npm install axios
COPY ./ .
CMD ["npm", "run", "build"]
