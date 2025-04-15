<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Donation</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-pink-300 via-pink-500 to-white min-h-screen">
    <header class="bg-pink-500 sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-3xl font-extrabold text-white">BiSignDo</a>
        </div>
    </header>

    <main class="container mx-auto px-6 py-8">
        <h1 class="text-4xl font-extrabold text-gray-800 mb-6">Create New Donation</h1>

        <form action="{{ route('donation_feedback.store_donation') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-600">Donation Title</label>
                <input type="text" id="title" name="title" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:outline-none" required>
            </div>

            <div class="mb-4">
                <label for="feedback" class="block text-sm font-medium text-gray-600">Feedback</label>
                <textarea id="feedback" name="feedback" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:outline-none"></textarea>
            </div>

            <button type="submit" class="bg-pink-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-pink-700">
                Create Donation
            </button>
        </form>
    </main>
</body>
</html>
