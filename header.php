<a href="home.html"><img id="logo" src="images/Logo.jpg" alt="Logo"></a>
<h1>Lettuce Get Some Deals</h1>
<form method="GET" action="">
<input type="text" size="100" name="search" placeholder="Search Here"/>
<a href="#search"><img id="search" src="images/search_icon.png" alt="search_icon" height="15"></a>
</form>
<nav>
    <p>
        <a href="#all-products">All Products</a>
        <a href="#categories">Categories</a>
        <a href="#best-deals">Best Deals</a>
        <a href="#about-us">About Us</a>
        <a href="#admin">Admin</a>
        <?php
            session_start();
            if($_SESSION['loggedIn'] == true) {
                printf("<a href=\"userprofile.php\">%s</a>",$_SESSION['username']);
                printf("<a href=\"signout.php\">Sign Out</a>");
            }else {
                echo '<a href="login.html">Log In</a>';
                echo '<a href="createuser.html">Sign Up</a>';
            }
        ?>
    </p>
</nav> 