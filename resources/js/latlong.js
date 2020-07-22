const axios = require('axios');
function geotag() {
// Make a request for a user with a given ID
    axios.get('https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key=AIzaSyAcTKeWJ2NXOT1j8niAKXEO7OwvsmNcdT8')
        .then(function (response) {
            // handle success
            console.log(response);
        })
        .catch(function (error) {
            // handle error
            console.log(error);
        })
        .then(function () {
            // always executed
        });
}
