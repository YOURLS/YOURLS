
// If javascript is enabled, display the button
document.getElementById('yourls-always').style.display = 'block';

// When button clicked, store a cookie that says the user doesn't want a toolbar
document.getElementById('yourls-always').onclick = yourls_cookie_no_toolbar_please;
function yourls_cookie_no_toolbar_please() {
	var exdate=new Date();
	exdate.setDate( exdate.getDate()+365 ); // store 365 days
	document.cookie = "yourls_no_toolbar=1;expires="+exdate.toUTCString() ;
}

