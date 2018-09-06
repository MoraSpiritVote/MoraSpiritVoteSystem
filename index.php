<!DOCTYPE html>
<html>
<head>
    <script src="https://connect.facebook.net/en_US/sdk.js"></script>
    <script src='https://cdn.firebase.com/js/client/2.2.1/firebase.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
    <script src="https://www.gstatic.com/firebasejs/5.4.1/firebase.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.4.1/firebase-auth.js"></script>
    
 
  <title></title>
</head>
<body>
    
    <script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyBAlhI2GtuIc9-00t1AslTVL2iJ_lFQJVc",
    authDomain: "msp-vote-fb-login.firebaseapp.com",
    databaseURL: "https://msp-vote-fb-login.firebaseio.com",
    projectId: "msp-vote-fb-login",
    storageBucket: "msp-vote-fb-login.appspot.com",
    messagingSenderId: "613251121623"
  };
  firebase.initializeApp(config);
</script>


<script>
   window.fbAsyncInit = function() {
      FB.init ({
         appId      : '259394757992098',
         xfbml      : true,
         version    : 'v2.6'
      });
   };

   (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) {return;}
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js";
      fjs.parentNode.insertBefore(js, fjs);
   } (document, 'script', 'facebook-jssdk'));
  
</script>


<script>
var provider = new firebase.auth.FacebookAuthProvider();

function facebookSignin() {
   firebase.auth().signInWithPopup(provider)
   
   .then(function(result) {
      var token = result.credential.accessToken;
      var user = result.user;
    
      console.log(token)
      console.log("111111111111111111")
      console.log(user)
      console.log("```````````````````````````````````")
      console.log(user.uid)
      console.log("`````````````````````````````````")
      if(user.uid!=null){
    console.log('qqqqqqqqqqqqqqqqqqqqqqqqqqq')
    
    window.location.href = "index-proccess.php?uid="+user.uid;
    console.log('qqqqqqqqqqqqqqqqqqqq')
}
   }).catch(function(error) {
      console.log(error.code);
      console.log(error.message);
   });
   
   

   
}

function facebookSignout() {
   firebase.auth().signOut()
   
   .then(function() {
      console.log('Signout successful!')
   }, function(error) {
      console.log('Signout failed')
   });
}

</script>
<script>
var user = firebase.auth().currentUser;
var name, email, photoUrl, uid, emailVerified;

if (user != null) {
  name = user.displayName;
  email = user.email;
  photoUrl = user.photoURL;
  emailVerified = user.emailVerified;
  uid = user.uid;  // The user's ID, unique to the Firebase project. Do NOT use
                   // this value to authenticate with your backend server, if
                   // you have one. Use User.getToken() instead.
 
}

console.log("@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@");



console.log(user);
</script>

<button onclick = "facebookSignin()">Facebook Signin</button>
<button onclick = "facebookSignout()">Facebook Signout</button>
</body>
</html>