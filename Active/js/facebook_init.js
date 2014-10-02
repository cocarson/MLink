
window.fbAsyncInit = function() {
  window.fbAsyncInit = function() {
    Parse.FacebookUtils.init({
      appId      : '730363177019030', // Facebook App ID
      //channelUrl : '//WWW.YOUR_DOMAIN.COM/channel.html', // Channel File
      cookie     : true, // enable cookies to allow Parse to access the session
      xfbml      : true  // parse XFBML
    });
   
    // Additional initialization code here
  };
};

(function(d, s, id){
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
