<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>

<body>
    <div class="container pt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div id="success_message" class="alert alert-success alert-dismissible fade show" role="alert" style="display:none;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong id="message"> </strong>
                </div>
                <form id="form">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="name">
                        <strong style="color:red" id="nameerror"></strong>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Age</label>
                        <input type="number" class="form-control" id="age" placeholder="age">
                        <strong style="color:red" id="ageerror"></strong>
                    </div>
                    <input type="submit" value="submit" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function validation() {
            var name = document.getElementById('name').value;
            var age = document.getElementById('age').value;
            if (name == '') {
                document.getElementById('nameerror').innerHTML = 'Name is required';
                return false;
            }
            if (age == '') {
                document.getElementById('ageerror').innerHTML = 'Age is required';
                return false;
            }

            return true;
        }
        document.querySelector('#form').addEventListener('submit', function(e) {
            e.preventDefault();
            var name = document.querySelector('#name').value;
            var age = document.querySelector('#age').value;
            axios.post('action.php', {
                    name: name,
                    age: age,
                })
                .then(function(response) {
                    console.log(response.data);
                    if (response.data.nameerror) {
                        document.getElementById('nameerror').innerHTML = response.data.nameerror;
                    }
                    if (response.data.ageerror) {
                        document.getElementById('ageerror').innerHTML = response.data.ageerror;
                    }
                    if (response.data.success) {
                        // alert(response.data.success);
                        document.getElementById('success_message').style.display = 'block';
                        document.getElementById('message').innerHTML = response.data.success;
                    }
                    // location.href = 'index.php';
                })
                .catch(function(error) {
                    console.log(error);
                });
        });
    </script>

</body>

</html>