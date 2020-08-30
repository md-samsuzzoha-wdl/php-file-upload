
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Post</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
</head>

<body>
    <div class="ui pointing menu">
        <div class="ui container">
            <a class="active item">
                Home
            </a>
            <a class="item">
                Messages
            </a>
            <a class="item">
                Friends
            </a>
            <div class="right menu">
                <div class="item">
                    <div class="ui transparent icon input">
                        <input type="text" placeholder="Search...">
                        <i class="search link icon"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <br>
    <div class="ui container">
        <form class="ui form blue segment" action="add-post.php" method="POST" enctype="multipart/form-data">
            <h1><strong>File upload</strong></h1>
            <div class="ui two fields">
                <div class="field">
                    <label for="title">Title <span>Use title case to get a better result</span></label>
                    <input type="text" name="title" id="title" class="form-controll" />
                </div>
                <div class="field">
                    <label for="caption">Caption <span>This caption should be descriptiv</span></label>
                    <input type="text" name="description" id="caption" class="form-controll" />
                </div>
            </div>


            <div class="field">
                <label for="images">Images <span>Your images should be at least 400x300 wide</span></label>
                <input type="file" name="images" id="images" required="required" multiple="multiple" />
            </div>

            <div class="ui field">
                <button class="ui blue button " type="submit" name="submit">Upload images</button>
            </div>

        </form>



        <br>
        <br>
        <br>

    </div>
    <div class="ui container">
        <div class="ui segment blue">
            <h1>
                Uploaded images
            </h1>
            <br>
            <?php
            // SHOWING DATA TO USERS 
            require('config.php');
            $sql = "SELECT * FROM post";
            $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            // print_r($result);
            // echo count($result);
            // echo $result['title'];
            ?>
            <div class="ui three stackable cards">
                <?php
                // https://www.php.net/manual/en/pdostatement.fetchall.php
                // array_shift — Shift an element off the beginning of array
                while ($row = array_shift($result)) {
                ?>
                    <div class="ui card">
                        <div class="image">
                            <img src="uploads/<?php echo $row['image_src']; ?>">
                        </div>
                        <div class="content">
                            <a class="header"><?php echo $row['title']; ?></a>
                            <div class="meta">
                                <span class="date">Joined in 2013</span>
                            </div>
                            <div class="description">
                                <?php echo $row['description']; ?>
                            </div>
                        </div>
                        <div class="extra content">
                            <a href="delete-post.php?id=<?php echo $row['id']; ?>" class="ui button red">Delete</a>
                        </div>
                    </div>
                <?php                }                ?>

            </div>


        </div>

    </div>


</body>

</html>