<?php

require "db.php";
$sql = "SELECT * FROM posts";
$select = $conn->query($sql);
?>


<!doctype html>
<html lang="en">

<head>
    <title>All Posts</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-title"> All Posts </div>
                    <div class="card-body">
                        <table class="table table-striped table-inverse table-responsive">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>S/N</th>
                                    <th>Title</th>
                                    <th>Body</th>
                                    <th>Posted Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                while ($results = $select->fetch_array()) {

                                    $title = $results['title'];
                                    $id = (int) $results['id'];
                                    $body = $results['body'];
                                    $date = $results['posted_date'];
                                ?>

                                    <tr>
                                        <td><?php echo  $i ?></td>
                                        <td scope='row'> <?php echo $title ?></td>
                                        <td> <?php echo $body ?></td>
                                        <td>
                                            <php echo $date ?>
                                        </td>
                                        <td><a href="action.php?delete=<?php echo $id ?>" class='btn btn-danger' onclick="confirm('Do you want  to delete this post?')">Delete</a></td>
                                        <td><a href="action.php?update=<?php echo $id ?>" class='btn btn-warning'>Update</a></td>
                                    </tr>

                                <?php
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>