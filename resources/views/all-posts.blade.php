<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
    <!-- Add your CSS styles or external CSS links here -->
</head>
<body>
    @auth
    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <div style="border: 3px solid black;">
        <a href="/">Your Posts</a>
        <h2>Create Post</h2>
        <form action="/create-post" method="POST">
            @csrf
            <input type="text" name="title" placeholder="Title">
            <textarea name="body" placeholder="Body content..."></textarea>
            <button type="submit">Upload</button>
        </form>
    </div>
    @else
    <h2>Welcome to the All Posts Page!</h2>
    <p><a href="{{ route('login') }}">Login</a> or <a href="{{ route('register') }}">Register</a> to create posts.</p>
    @endauth

    <div style="border: 3px solid black;">
        <h2>All Posts</h2>
        @foreach($posts as $post)
        <div style="background-color: gray; padding: 10px; margin: 10px;">
            <h3>{{ $post->title }}</h3>
            <h3>User: {{ $post->user->name }}</h3>
            {{ $post->body }}
        </div>
        @endforeach
    </div>
</body>
</html>



