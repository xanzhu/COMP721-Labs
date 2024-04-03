<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Web Development - Lab05</title>
</head>

<body>
    <h1>Web Development - Lab05</h1>
    <!-- Simple Nav example -->
    <nav>
        <a href="vip_member.php">Return</a>
        <a href="member_display.php">Display All Members Page</a>
        <a href="member_search.php">Search Members Page</a>
    </nav>
    <div class="content">
        <form action="member_add.php" method="POST">
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="fname" pattern="[A-Za-z ]+" title="Please enter values A-Z only!">
            <br>
            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="lname" pattern="[A-Za-z ]+" title="Please enter values A-Z only!">
            <br>
            <label for="gender">Gender</label>
            <input type="text" id="gender" name="gender" pattern="[MFmf]" maxlength="1" title="Select only M or F!">
            <br>
            <label for="email">Email</label>
            <input type="email" id="email" name="email">
            <br>
            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone">
            <br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>

</html>