# base image
FROM node:8.10.0-alpine

# Create app directory
WORKDIR /app

# Install app dependencies
COPY package*.json ./

RUN npm install

# Bundle app source
COPY . .

EXPOSE 8081 

CMD [ "npm", "run", "dev"]