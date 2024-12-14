function highlight(element) {
    document.querySelectorAll('container_Menu > div').forEach(div => div.classList.remove('active')); 
    element.classList.add('active');
  }

var info_Profile_1 = document.querySelector('.info_Profile_1');
var btn_logout = info_Profile_1.querySelector('button');

btn_logout.addEventListener('click', function() {
    fetch("./php/log_out.php", { method: "POST" })
    window.location.href = "index.php";
});