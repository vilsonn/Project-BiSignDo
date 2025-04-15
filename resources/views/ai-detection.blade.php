@extends('layout.app')

@section('title', 'AI Sign Detection')

@section('content')
<div class="bg-gradient-to-b from-pink-100 via-pink-50 to-white py-16">
    <div class="container mx-auto px-6">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-5xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-purple-500">
                AI Sign Language Detection
            </h1>
            <p class="text-lg text-pink-700 mt-4">
                Real-time sign language detection using your camera.
            </p>
        </div>

        <!-- Video Section -->
        <div class="bg-white rounded-xl shadow-2xl p-10 mx-auto max-w-4xl text-center">
            <!-- Switch Button -->
            <div class="mb-8 flex items-center justify-center">
                <label for="cameraSwitch" class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" id="cameraSwitch" class="sr-only peer">
                    <div class="w-14 h-8 bg-gray-300 rounded-full peer dark:bg-gray-700 peer-checked:bg-green-400 peer-checked:after:translate-x-6 after:content-[''] after:absolute after:top-1 after:left-1 after:bg-gray-500 after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:after:bg-white peer-checked:shadow-md dark:border-gray-600 shadow-inner"></div>
                    <span id="switchLabel" class="ml-3 text-lg font-semibold text-gray-700 dark:text-gray-300 transition-all peer-checked:text-green-600">
                        Camera Off
                    </span>
                </label>
            </div>

            <!-- Video Stream -->
            <div id="videoContainer" class="border-4 border-dashed border-pink-300 rounded-xl shadow-md mx-auto w-[640px] h-[360px] bg-gray-100 flex items-center justify-center relative overflow-hidden">
                <p id="placeholderText" class="text-gray-500 font-semibold">Camera is Off</p>
                <img id="videoStream" src="{{ $videoFeedUrl }}" alt="AI Video Stream" class="absolute inset-0 w-full h-full object-cover hidden rounded-lg">
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const cameraSwitch = document.getElementById('cameraSwitch');
        const videoStream = document.getElementById('videoStream');
        const placeholderText = document.getElementById('placeholderText');
        const switchLabel = document.getElementById('switchLabel');

        cameraSwitch.addEventListener('change', function () {
            if (this.checked) {
                videoStream.classList.remove('hidden');
                placeholderText.classList.add('hidden');
                switchLabel.textContent = 'Camera On';
            } else {
                videoStream.classList.add('hidden');
                placeholderText.classList.remove('hidden');
                switchLabel.textContent = 'Camera Off';
            }
        });
    });
</script>
@endsection