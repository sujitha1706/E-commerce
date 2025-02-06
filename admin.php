<?php
session_start(); // Start the session
$fullname = isset($_SESSION['fullname']) ? $_SESSION['fullname'] : "Guest User";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Link to FontAwesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f1f3f6;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .logo {
            display: flex;
            flex-direction: column;
        }

        .brand {
            font-size: 20px;
            font-weight: bold;
            color: #007BFF;
        }

        .endless {
            font-size: 12px;
            color: #555;
        }

        .shopping {
            color: #FFC107;
            font-weight: bold;
        }

        .search-bar {
            flex: 1;
            margin: 0 10px;
            position: relative;
        }

        .search-bar input {
            width: 70%;
            padding: 8px 30px;
            border: 1px solid #ddd;
            border-radius: 20px;
            outline: none;
            font-size: 13px;
        }

        .search-icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
            font-size: 16px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .nav-links a {
            text-decoration: none;
            font-size: 14px;
            color: #333;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #007BFF;
        }

        /* Dropdown Styles */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-btn {
            background-color: #e5e9ed;
            color: #333;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .dropdown-btn i {
            margin-left: 5px;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #fff;
            min-width: 160px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
            z-index: 1;
            border-radius: 5px;
        }

        .dropdown-content a {
            color: #333;
            padding: 10px 15px;
            text-decoration: none;
            display: block;
            font-size: 14px;
            border-bottom: 1px solid #ddd;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .profile-section {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .profile-header {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
        }
        .profile-avatar i {
            font-size: 50px;
            color: #666;
        }
        .profile-name span {
            font-size: 24px;
            font-weight: bold;
        }
        .profile-details p {
            font-size: 16px;
            color: #777;
        }
        .auth-links {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .auth-links a {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border-radius: 5px;
            font-weight: bold;
        }
        .auth-links a:hover {
            background-color: #0056b3;
        }
        .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-btn {
        background-color: #e5e9ed;
        color: #333;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
    }

    .dropdown-btn i {
        margin-left: 5px;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #fff;
        min-width: 200px;
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
        z-index: 1;
        border-radius: 5px;
    }

    .dropdown-content a {
        color: #333;
        padding: 10px 15px;
        text-decoration: none;
        display: block;
        font-size: 14px;
        border-bottom: 1px solid #ddd;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .logout-link {
        color: #ff5722;
        font-weight: bold;
    }

    .logout-link:hover {
        color: #e64a19;
    }
    h1{
        font-size: 50px;
        text-align: center;
    }
    span{
        color: #7494ec;
    }
    .box p{
        font-size: 22px;
    }
    .box button{
        display: block;
        width: 300px;
        margin: 0 auto;
        color: #fff;
    }
    button{
    width: 100%;
    padding: 12px;
    background: #7494ec;
    border-radius: 6px;
    cursor: pointer;
    border: none;
    font-size: 16px;
    color: #fff;
    margin-bottom: 20px;
    font-weight: 500;
    transition: 0.5s;
    }
    .button-container {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 20px;
    }

    .button-container button {
        padding: 40px 20px;
        font-size: 16px;
        font-weight: bold;
        border: none;
        border-radius: 15px;
        cursor: pointer;
        color: white;
        transition: 0.3s;
    }

    .button-container button:nth-child(1) { background-color: #007BFF; } /* Orders */
    .button-container button:nth-child(2) { background-color: #DC3545; } /* Wishlist */
    .button-container button:nth-child(3) { background-color: #28A745; } /* Cart */

    .button-container button:hover {
        opacity: 0.8;
    }

    .button-container button i {
        margin-right: 8px;
    }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header class="header">
        <div class="logo">
            <a href="home.html" style="text-decoration: none;">
            <span class="brand">Style</span><br>
            <small class="endless">Fashion <span class="shopping">Go</span></small>
            </a>
        </div>
        <div class="search-bar">
            <i class="fas fa-search search-icon"></i>
            <input type="text" placeholder="Search for Products, Brands and More">
        </div>
        <div class="nav-links">
            <div class="dropdown">
                <button class="dropdown-btn">
                    Categories <i class="fas fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="home.html">Home</a>
                    <a href="mens.html">Men's Wear</a>
                    <a href="womens.html">Women's Wear</a>
                    <a href="mobile.html">Mobiles</a>
                    <a href="electronics.html">Electronics</a>
                </div>
            </div>
        
            <div class="dropdown">
                <button class="dropdown-btn">
                    <i class="fas fa-user"></i> User Account <i class="fas fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="profile.html"><i class="fas fa-user-circle"></i> My Profile</a>
                    <a href="logout.php" class="logout-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
            </div>
        </div>
    </header>

    

<div class="box">
    <h1>Welcome to, <span><?= htmlspecialchars($fullname); ?></span></h1>
    
    <?php if (isset($_SESSION['fullname'])): ?>
        <button onclick="window.location.href='logout.php'">Logout</button>
    <?php else: ?>
        <button onclick="window.location.href='login.php'">Login</button>
    <?php endif; ?>
</div>


<div class="button-container">
    <button onclick="window.location.href='orders.html'">
        <i class="fas fa-box"></i> My Orders
    </button>
    <button onclick="window.location.href='wishlist.html'">
        <i class="fas fa-heart"></i> Wishlist
    </button>
    <button onclick="window.location.href='cart.html'">
        <i class="fas fa-shopping-cart"></i> Cart
    </button>
</div>
</body>
</html>
