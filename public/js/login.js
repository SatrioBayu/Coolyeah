var x = document.getElementById("login");
var y = document.getElementById("register");
var z = document.getElementById("btn");

function register() {
  x.style.left = "-400px";
  y.style.left = "50px";
  z.style.left = "110px";
 }

function login() {
  x.style.left = "50px";
  y.style.left = "450px";
  z.style.left = "0px";
}

function terms_changed(termsCheckBox) {
  if(termsCheckBox.checked) {
    document.getElementById("reg").disabled = false;
    document.getElementById("reg").style.opacity = "1";
    document.getElementById("reg").style.cursor = "pointer";
  } else {
    document.getElementById("reg").disabled = true;
    document.getElementById("reg").style.cursor = "no-drop";
  }
}