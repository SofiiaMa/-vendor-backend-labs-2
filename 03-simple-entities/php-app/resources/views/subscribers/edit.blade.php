<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Subscriber</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
body {
    background: linear-gradient(45deg, #2196f3, #f44336); /* Vibrant gradient */
    font-family: 'Roboto Mono', monospace; 
}

.container {
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(255, 255, 255, 0.2); /* Subtle white glow */
}

h1 {
    color: #fff; /* White text */
    text-shadow: 0 0 5px #0ff; /* Neon blue text shadow */
}

/* Form Styling */
label {
    color: #fff;
    margin-bottom: 5px;
}

input, 
button {
    background-color: transparent;
    border: 1px solid #fff;
    color: #fff;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 15px;
    transition: all 0.3s ease; /* Smooth transition for hover effect */
}

input:hover,
button:hover {
    box-shadow: 0 0 10px #0ff; /* Blue glow on hover */
}

/* Link Styling */
a {
    color: #fff;
    text-decoration: none;
    border-bottom: 1px dashed #fff;
    transition: all 0.3s ease;
}

a:hover {
    color: #0ff; /* Blue color on hover */
}
    </style>
</head>
<body class="bg-gradient-to-br from-gray-900 to-blue-800 min-h-screen">
    <div class="container mx-auto p-8">
        <h1 class="text-3xl text-white font-mono font-bold mb-4">Edit Subscriber</h1>
        <form action="{{ route('subscribers.update', $subscriber->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="name" class="block text-white font-mono mb-2">Name:</label>
                <input type="text" id="name" name="name" value="{{ $subscriber->name }}" 
                       class="w-full rounded-lg bg-gray-700 text-white p-2 focus:outline-none focus:ring focus:ring-blue-500">
            </div>
            <div>
                <label for="email" class="block text-white font-mono mb-2">Email:</label>
                <input type="email" id="email" name="email" value="{{ $subscriber->email }}"
                       class="w-full rounded-lg bg-gray-700 text-white p-2 focus:outline-none focus:ring focus:ring-blue-500">
            </div>
            <div>
                <label for="tags" class="block text-white font-mono mb-2">Tags:</label>
                <input type="text" id="tags" name="tags" 
                       value="{{ is_array($subscriber->tags) ? implode(', ', $subscriber->tags) : $subscriber->tags }}"
                       class="w-full rounded-lg bg-gray-700 text-white p-2 focus:outline-none focus:ring focus:ring-blue-500"> 
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Update 
            </button>
        </form>
        <a href="{{ route('subscribers.index') }}" class="text-white mt-4">Back to List</a> 
    </div>
</body>
</html>
