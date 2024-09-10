<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    @auth
    <p>Congrats you are logged in.</p>



    <form action="/logout" method="POST">
        @csrf
        <button style="cursor: pointer">Log Out</button>
    </form>
    <div style="border:3px solid black"  >
        <h2>Create a New Post</h2>
        <form action="/create-post" method="POST">
            @csrf
            <input type="text" name="title" placeholder="post title">
            <textarea name="body"  placeholder="body content..."></textarea>
            <br>
            <br>
            <button>Save Post</button>
        </form>
    </div>
    <div style="border:3px solid black"  >
        <h2>All Posts :</h2>
        @foreach ($posts as $post)

        <div  style="background-color:gray; padding:10px; margin:10px;" ></div>
        <h3>{{$post['title']}} <br> by {{$post->user->name}}</h3>
        {{$post['body']}}

        <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
        <form action="/delete-post/{{$post->id}}" method="POST">
        
            @csrf
            @method('DELETE')
            <button>Delete</button>

        </form>


        @endforeach

    </div>


    @else
    <div style="border: 5px solid black">
        <h1>Registration</h1>
        <form action="/register" method="POST">
            @csrf
            <input type="text" name="name" placeholder="name"><br><br>
            <input type="email" name="email" placeholder="email"><br><br>
            <input type="password" name="password" placeholder="password"><br><br>
            <input type="submit" value="Register" style="cursor: pointer">
        </form>
    </div>
    <div style="border: 5px solid black">
        <h1>Login</h1>
        <form action="/login" method="POST">
            @csrf
            <input type="text" name="loginname" placeholder="name"><br><br>
            <input type="password" name="loginpassword" placeholder="password"><br><br>
            <input type="submit" value="login" style="cursor: pointer">
        </form>
    </div>
    @endauth
</body>

</html>
