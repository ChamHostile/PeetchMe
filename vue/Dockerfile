FROM node:lts-alpine as build-stage

RUN npm install -g http-server

WORKDIR /app

COPY package*.json /app/

RUN yarn install
RUN npm install -D webpack-cli  
RUN npm install

COPY . .

RUN mkdir -p node_modules/.cache && chmod -R 777 node_modules/.cache

# RUN npm install @vue/cli@3.7.0 -g
# RUN npm install eslint-plugin-vue -u
# RUN npm install vue-template-compiler
# FROM nginx:stable-alpine as production-stage
# COPY --from=build-stage /usr/app /usr/share/nginx/html
EXPOSE 3000
CMD [ "npm", "dev" ]
