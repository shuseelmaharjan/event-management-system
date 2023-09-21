<ul class="menu">
  <li><a href="test.php">Home</a></li>
  <li><a href="about.php">About</a></li>
  <li><a href="services.html">Services</a></li>
  <li><a href="contact.html">Contact</a></li>
</ul>
<style>
    .menu {
  list-style: none;
  padding: 0;
  display: flex;
  justify-content: center;
}

.menu li {
  margin: 0 20px;
}

.menu li a {
  text-decoration: none;
  color: #333;
  font-weight: bold;
}

/* Style the active menu item */
.menu li.active a {
  color: #ff5733; /* Change the color for the active item */
  background: rebeccapurple;
}

</style>
<script>
    // Get the current URL
var currentUrl = window.location.href;
console.log(currentUrl);
// Loop through each menu item and check if its href matches the current URL
var menuItems = document.querySelectorAll('.menu li a');
menuItems.forEach(function (menuItem) {
  if (menuItem.href === currentUrl) {
    menuItem.parentElement.classList.add('active'); // Add 'active' class to the parent li
  }
});

</script>