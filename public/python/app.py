from flask import Flask, render_template, Response, request
from ultralytics import YOLO
import cv2

app = Flask(__name__)
model = YOLO("bisindo.pt")  # Path to your YOLO model

class VideoCamera:
    def __init__(self):
        self.video = cv2.VideoCapture(0)  # Capture webcam
    
    def __del__(self):
        self.video.release()
    
    def get_frame(self):
        success, frame = self.video.read()
        if not success:
            return None

        # Run detection
        results = model.predict(frame, conf=0.5)
        for result in results:
            frame = result.plot()
        
        # Encode frame to JPEG
        _, jpeg = cv2.imencode('.jpg', frame)
        return jpeg.tobytes()

camera = VideoCamera()

@app.route('/video_feed')
def video_feed():
    def generate():
        while True:
            frame = camera.get_frame()
            if frame is None:
                break
            yield (b'--frame\r\n'
                   b'Content-Type: image/jpeg\r\n\r\n' + frame + b'\r\n\r\n')
    return Response(generate(), mimetype='multipart/x-mixed-replace; boundary=frame')

if __name__ == '__main__':
    app.run(debug=True, host='0.0.0.0')
