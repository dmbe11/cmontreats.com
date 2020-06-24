'use strict';

module.exports = {
  port: 4000,
  stripe: {
    // Include your Stripe secret key here
    secretKey: 'whsec_3qsXphqtWAvcgavSWUqYGM7EZU6x9P6l'
  },
  /*
     Stripe needs a public URL for our server that it can ping with new events.
     If ngrok is enabled, this server will create a public endpoint for you.
  */
  ngrok: {
    enabled: true,
    /*
       Optional: if you have a Pro ngrok account you can provide a custom
       subdomain and your authentication token here.
    */
    subdomain: cmontreats.ngrok.io
    ,
    authtoken: 1cVMwhY4TtxuZwQ0CEo8jI1Rido_6J1qhAnhDxYmVY2ty7Y2w
  }
}
