
<!-- Paste this code into an external JavaScript file named: charCount.js  -->

/* This script and many more are available free online at
The JavaScript Source :: http://javascript.internet.com
Created by: kojak :: http://commoncoder.com */

// fieldname, warningname, remainingname, maxchars
function CheckFieldLength(fn,wn,rn,mc) {
  var len = fn.value.length;
  if (len > mc) {
    fn.value = fn.value.substring(0,mc);
    len = mc;
  }
  document.getElementById(wn).innerHTML = len;
  document.getElementById(rn).innerHTML = mc - len;
}

