<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Login/Register</title>
</head>
<body>

    @auth
        
    <h2>you are logged in!</h2>
    <form action="/logout" method="POST">
    @csrf
    <button>logout</button>
    </form>

    <div style="border: 3px solid black;">
        <a href="{{ route('all-posts') }}">All Posts</a>
        <h2>Create Post</h2>
        <form action="/create-post" method="POST">
        @csrf
        <input type="text" name="title" placeholder="title">
        <textarea name="body" placeholder="body content..."></textarea>
        <button>upload</button>
        </form>
    </div>

    <div style="border: 3px solid black;">
        <h2>Your Feed</h2>
        @foreach($posts as $post)
        <div style="background-color:gray; padding: 10px; Margin: 10px;">
            <h3>{{$post['title']}}</h3><br><h3>user:{{$post->user->name}}</h3>
            {{$post['body']}}
            <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
            <form action="delete-post/{{$post->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button>Delete</button>
            </form>
        </div>
        @endforeach

    </div>
        
    @else

    <div style="border: 3px solid black;">
        <h2>Register</h2>
        <form action="/register" method="POST">
         @csrf
        <input name="name" type="text" placeholder="name">
        <input name="email" type="text" placeholder="email">
        <input name="password" type="password" placeholder="password">
        <button>Register</button>

        </form>
    </div>
        
        <div style="border: 3px solid black;">
            <h2>Login</h2>
            <form action="/login" method="POST">
             @csrf
            <input name="loginname" type="text" placeholder="name">
            <input name="loginpassword" type="password" placeholder="password">
            <button>Login</button>

            </form>
        </div>

    @endauth

   
</body>
</html>