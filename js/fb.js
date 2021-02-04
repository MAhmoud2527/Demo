// var shadow = document.getElementById("shadow");



function login(x) {
		var email = document.getElementById("email");
		var pass = document.getElementById("pass");
		var mob = document.getElementById("mob");
		var xhr = new XMLHttpRequest();

		xhr.onreadystatechange = function() {
			if(this.readyState === 4 && this.status === 200) {
				if(email.value.length < 1) {
					email.style.border = '1px solid #F55';
				}else {
					email.style.border = '1px solid #DDD';
				}
				if(pass.value.length < 1) {
					pass.style.border = '1px solid #F55';
				}else {
					pass.style.border = '1px solid #DDD';
				}
				if(email.value.length > 0 && pass.value.length > 0) {
					window.location = this.responseText;
				}
			}
		}
		xhr.open('GET', 'ajax.php?email='+email.value+'&pass='+pass.value+'&mob='+mob.value, true);
		xhr.send('');
	}