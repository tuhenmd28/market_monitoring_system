 var input = document.querySelector("#phone");
 var input2 = document.querySelector("#gphone");
 var input3 = document.querySelector("#kin_details_phone");
 var input2nd = document.querySelector('#phone-2');
 if (input) {
  var iti = window.intlTelInput(input, {
    // allowDropdown: false,
    // autoHideDialCode: false,
    // autoPlaceholder: "off",
    // dropdownContainer: document.body,
    // excludeCountries: ["us"],
    // formatOnDisplay: false,
    // geoIpLookup: function(callback) {
    //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
    //     var countryCode = (resp && resp.country) ? resp.country : "";
    //     callback(countryCode);
    //   });
    // },
    geoIpLookup: function(callback) {
      $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
        var countryCode = (resp && resp.country) ? resp.country : "";
        callback(countryCode);
      });
    },
    hiddenInput: "0",
    initialCountry: "auto",
    // localizedCountries: { 'de': 'Deutschland' },
    // nationalMode: false,

    // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
    // placeholderNumberType: "MOBILE",
    // preferredCountries: ['cn', 'jp'],
    separateDialCode: true,
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.15/js/utils.js",
  });

}

if(input2){
  var iti2 = window.intlTelInput(input2, {
    initialCountry: "auto",
    geoIpLookup: function(callback) {
        $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
          var countryCode = (resp && resp.country) ? resp.country : "";
          callback(countryCode);
        });
      },
    hiddenInput: "0",
    separateDialCode: true,
    utilsScript: "../assets/plugins/intl-tel-input-master/utils.js",
  });
}

if(input3){
  var iti3 = window.intlTelInput(input3, {
    initialCountry: "auto",
    geoIpLookup: function(callback) {
        $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
          var countryCode = (resp && resp.country) ? resp.country : "";
          callback(countryCode);
        });
      },
    hiddenInput: "0",
    separateDialCode: true,
    utilsScript: "../assets/plugins/intl-tel-input-master/utils.js",
  });
}

if(input2nd){
  window.intlTelInput(input2nd, {
    initialCountry: "auto",
    geoIpLookup: function(callback) {
        $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
          var countryCode = (resp && resp.country) ? resp.country : "";
          callback(countryCode);
        });
      },
    hiddenInput: "0",
    separateDialCode: true,
    utilsScript: "../assets/plugins/intl-tel-input-master/utils.js",
  });
}

document.querySelectorAll(".iti--allow-dropdown").forEach(element => {
  element.classList.add('w-100');
});
