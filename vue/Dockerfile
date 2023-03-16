# base image
FROM node:lts

# Create app directory
WORKDIR /app

# Install app dependencies
COPY package*.json yarn.lock ./

RUN yarn install

# Bundle app source
COPY . .

EXPOSE 8081 

CMD [ "yarn", "start"]

