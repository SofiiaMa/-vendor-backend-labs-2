<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Subscriber</title>
    <style>
 body {
    background: radial-gradient(circle at top left, #222, #000); 
    color: white;
    font-family: 'Roboto Mono', monospace;
}
.container {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
    background-color: rgba(255, 255, 255, 0.1); 
}
h1 {
    text-align: center;
    font-size: 3em;
    text-shadow: 0 0 10px #00ffff; 
}
.subscriber-details {
    margin-top: 30px;
}
.subscriber-details p {
    margin-bottom: 15px;
    padding: 10px;
    border-radius: 5px;
    background-color: rgba(0, 0, 0, 0.2);
}
strong {
    color: #00ffff;
}
a {
    color: #00ffff;
    text-decoration: none;
}
a:hover {
    text-decoration: underline;
}      
    </style>
</head>
<body>
    <div class="container">
        <h1>Subscriber Details</h1>
        <!-- Вывод данных о подписчике -->
        <div class="subscriber-details">
            <p><strong>ID:</strong> {{ $subscriber->id }}</p>
            <p><strong>Name:</strong> {{ $subscriber->name }}</p>
            <p><strong>Email:</strong> {{ $subscriber->email }}</p>
            <p><strong>Tags:</strong> {{ is_array($subscriber->tags) ? implode(', ', $subscriber->tags) : $subscriber->tags }}</p>
        </div>

        <!-- Кнопка "Back to List" -->
        <a href="{{ route('subscribers.index') }}">Back to List</a>
    </div>
</body>
</html>
