<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
    
        p {
            font-size: 18px;
            color: #28a745;
            text-align: center;
            font-weight: bold;
        }
    
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 15px;
        }
    
        input, textarea {
            width: 90%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    
        button {
            background: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            transition: 0.3s ease;
        }
    
        button:hover {
            background: #218838;
        }
    
        div {
            max-width: 500px;
            margin: 20px auto;
            background: white;
            padding: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
    
        h2 {
            text-align: center;
            color: #333;
        }
    
        .post {
            background: #fff3cd;
            padding: 15px;
            border-left: 5px solid #ff9800;
            margin-bottom: 10px;
            border-radius: 5px;
        }
    
        a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
            text-align: center;
            display: block;
        }
    
        a:hover {
            text-decoration: underline;
        }
    </style>
    
</head>
<body>
   @auth
   <p>Congratulation you have logged in.</p>
   <form action="/logout" method="POST">
   @csrf
   <button>log out</button>
   </form>
   
   <div style="border : 3px solid black;">
    <h2>Create a New Post</h2>
    <form action="createPost" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Title" required><br><br>
        <textarea name="body" placeholder="body content..."></textarea>
        <button>Save Post</button>       
    </form>
   </div>

   <div style="border : 3px solid black;">
    <h2>All Posts</h2>
    @foreach ($posts as $post)
        <div style="background-color:rgb(254, 247, 247); padding:10px; margin:10px;">
            <h3>{{$post['title']}}</h3>
            {{$post['body']}}</p>
            <p><a href="/edit-post{{$post->id}}">Edit</a></p>
            <form action="/delete-post/{{$post->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button>DELETE</button>

            </form>
        </div>
    @endforeach
   </div>


   @else
   <div style="border : 3px solid black;">
    <h2>Register</h2>
    <form action="/register" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Name" ><br><br>
        <input type="email" name="email" placeholder="Email" ><br><br>
        <input type="password" name="password" placeholder="Password" ><br><br>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" required><br><br>
        <button >Register</button>
        <a href="welcome">welcome</a>
    </form>
</div>

<div style="border : 3px solid black;">
    <h2>Login</h2>
    <form action="/login" method="POST">
        @csrf
        <input type="text" name="loginname" placeholder="Name" ><br><br>
        <input type="password" name="loginpassword" placeholder="Password" ><br><br>
        <button>Login</button>
    </form>
</div>
   @endauth

</body>
</html>