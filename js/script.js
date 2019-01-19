console.log("Started");

$(document).ready(function(){
	$("Button#regbutton").mouseleave(function(){
  		alert("Click to go registeration page");
  		console.log("ok");
	});
});


$(document).ready(function() {
	$("#reg").onclick(function() {
		console.log("Started");
		var name = $("#name").val();
		var email = $("#email").val();
		var password = $("#password1").val();
		var cpassword = $("#password2").val();
		if (name == '' || email == '' || password == '' || cpassword == '') {
			alert("Please fill all fields...!!!!!!");
		} else if ((password.length) < 8) {
			alert("Password should atleast 8 character in length...!!!!!!");
		} else if (!(password1).match(password2)) {
			alert("Your passwords don't match. Try again?");
		} else {
			$.post("checkregister.php", {
				name: name,
				email: email,
				password1: password1,
				password2: password2
			});
		}
	});
});