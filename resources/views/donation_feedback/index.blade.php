<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Feedback | Index</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-pink-300 via-pink-500 to-white min-h-screen">
    <header class="bg-pink-500 sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-3xl font-extrabold text-white">BiSignDo</a>
        </div>
    </header>

    <main class="container mx-auto px-6 py-8">
        <h1 class="text-4xl font-extrabold text-gray-800 mb-6">Donations and Feedback</h1>

        <a href="{{ route('donation_feedback.create_donation') }}" class="mb-6 inline-block bg-pink-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-pink-700">
            + New Donation
        </a>

        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="w-full table-auto">
                <thead class="bg-pink-600 text-white">
                    <tr>
                        <th class="px-4 py-3 text-left">No</th>
                        <th class="px-4 py-3 text-left">Donation Title</th>
                        <th class="px-4 py-3 text-left">Feedback</th>
                        <th class="px-4 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($donations as $donation)
                        <tr class="border-b border-gray-200">
                            <td class="px-4 py-3">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3">{{ $donation->title }}</td>
                            <td class="px-4 py-3">{{ $donation->feedback }}</td>
                            <td class="px-4 py-3">
                                <a href="{{ route('donation_feedback.edit_donation', $donation->id) }}" class="text-pink-500 hover:underline mr-3">Edit</a>
                                <form action="{{ route('donation_feedback.destroy_donation', $donation->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
