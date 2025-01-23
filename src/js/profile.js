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

function showSection(section) {
  var sections = document.querySelectorAll('.section');
  sections.forEach(function(sec) {
      sec.classList.add('hidden');
  });
  document.querySelector('.info_' + section.charAt(0).toUpperCase() + section.slice(1)).classList.remove('hidden');
}

function highlight(element) {
  var menuItems = document.querySelectorAll('.menu_Profile, .menu_Orders, .menu_Dashboard, .menu_Admin');
  menuItems.forEach(function(item) {
      item.classList.remove('active');
  });
  element.classList.add('active');
}