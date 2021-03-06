<?php
    session_start();

    if (isset($_SESSION["username"]))
    {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameX</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/form.css">
    <script type="text/javascript" src="../js/collapsible.js"></script>

</head>
<body>
    <header id="masthead">
        <h1>GameX Gaming Blog</h1>
        <?php
        ?>
        <nav>
            <ul>
                <li><a href="../HTML/main1.php">Home</a></li>
                <li><a href="../HTML/createPost.php">Post</a></li>
                <li><a href="../HTML/editProfile.php">ViewProfile</a></li>
                <li><a href="../HTML/logout.html">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <article>
                <img src="../img/soccer.jpeg" alt="image1">
                <div>
                    <h3>Sports Game</h3>
                    <span>EA Studio</span>
                    <p>If youre a soccer fan this game is for you</p>
                    <a href="../HTML/board3.php"><h6>Read More</h6></a>
                </div>
            </article>
            <article>
                <img src="../img/cod.png" alt="image2">
                <div>
                    <h3>Shooting Game</h3>
                    <span>Trinity Studio</span>
                    <p>We swear we fixed all the problems this time.</p>
                    <a href="../HTML/board1.php"><h6>Read More</h6></a>
                </div>
            </article>
            <article>
                <img src="../img/sims.jpeg" alt="image3">
                <div>
                    <h3>Adventure Hero</h3>
                    <span>Super Studio</span>
                    <p>Ever wanted to become a superhero?</p>
                    <a href="../HTML/board5.php"><h6>Read More</h6></a>
                </div>
            </article>
            <article>
                <img src="../img/ftl.jpeg" alt="image4">
                <div>
                    <h3>Space Simulations</h3>
                    <span>slimeMakers</span>
                    <p>Live your fantasy life!</p>
                    <a href="../HTML/board2.php"><h6>Read More</h6></a>
                </div>
            </article>
            <article>
                <img src="../img/outlast.jpeg" alt="image5">
                <div>
                    <h3>Horror Forest</h3>
                    <span>Creepsters</span>
                    <p>Winner of the horror game award 2021</p>
                    <a href="../HTML/board4.php"><h6>Read More</h6></a>
                </div>
            </article>
        </section>
        <aside>
            <div>
                <h1 class="searchbar">Search Topic</h1>
                <form action="searchpage.html">
                    <input type="submit" value="Search for a game" />
                </form>
                        </div>
            <div>
                <h3>Join a group</h3>
                <form action="groups.html">
                    <input type="submit" value="View groups" />
                </form>
            </div>
            <div>
                <h3>More Discussions</h3>
                <p>double click to find out more</p>
                <a href="https://store.steampowered.com/"><p>New Release</p></a>
                <button type="button" class="collapsible" onclick="collapse()">Click to view description</button>
                <div class="content">
                  <p> Find out new games have just hit the shelves and what people are saying about them!</p>
                </div>
                <a href="https://www.ign.com/upcoming/games"><p>Upcoming Release</p></a>
                <button type="button" class="collapsible" onclick="collapse()">Click to view description</button>
                <div class="content">
                  <p> Find out what game developers have been working on and watch their trailers!</p>
                </div>
                <a href="https://newzoo.com/insights/rankings/top-20-pc-games/"><p>Popular</p></a>
                <button type="button" class="collapsible" onclick="collapse()">Click to view description</button>
                <div class="content">
                  <p> Find out whats popular amoungst the gamer community!</p>
                </div>
            </div>
        </aside>
    </main>
    <footer>
        <h1>
            Join us on Discord!
        </h1>
    </footer>
</body>
</html>
<?php
    }
    else
    {

        header("Location: main.html");
        exit();
    }
?>