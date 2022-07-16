<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <title>Document</title>
</head>

<body>
    @if (Session::has('thành công'))
        {{ Session::get('thành công') }}
    @endif
    <div>
        <div class="create">
            <a role="button" href="/create" class="btn btn-primary"
                onclick="return confirm('Bạn có muốn thêm mới!')">Create</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Content</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>

                </tr>
            </thead>
            @foreach ($posts as $post)
                <tbody>
                    <tr>
                        <th>{{ $post->title }}</th>
                        <td>
                            <img src="http://localhost:8000/img/{{ $post->image }}" width="100px" height="100px"
                                class="avatar" alt="Avatar" />
                        </td>
                        <td>{{ $post->content }}</td>
                        <td>
                            <a href="/{{ $post->id }}/edit" role="button" class="btn btn-primary"
                                onclick="return confirm('Bạn có muốn sửa!')">Edit</a>
                        </td>
                        <td>
                            <a href="/delete/{{ $post->id }}" role="button" class="btn btn-danger mt-2"
                                onclick="return confirm('Bạn có muốn xóa!')">Delete</a>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
</body>

</html>