import * as THREE from './three.min.js';

let scene, camera, renderer, plane;
const speed = 0.05;

function init() {
    scene = new THREE.Scene();
    camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
    renderer = new THREE.WebGLRenderer();
    renderer.setSize(window.innerWidth, window.innerHeight);
    document.body.appendChild(renderer.domElement);

    // Lighting
    const ambientLight = new THREE.AmbientLight(0x404040);
    scene.add(ambientLight);
    const pointLight = new THREE.PointLight(0xffffff);
    pointLight.position.set(50, 50, 50);
    scene.add(pointLight);

    // Load Plane Model
    const loader = new THREE.ObjectLoader();
    loader.load('assets/plane.obj', function (obj) {
        plane = obj;
        plane.scale.set(0.5, 0.5, 0.5);
        scene.add(plane);
        plane.position.z = -5;
    });

    camera.position.z = 5;

    animate();
}

function animate() {
    requestAnimationFrame(animate);

    // Basic Controls
    if (plane) {
        if (keys['ArrowUp']) plane.position.y += speed;
        if (keys['ArrowDown']) plane.position.y -= speed;
        if (keys['ArrowLeft']) plane.position.x -= speed;
        if (keys['ArrowRight']) plane.position.x += speed;
    }

    renderer.render(scene, camera);
}

const keys = {};
window.addEventListener('keydown', function (e) {
    keys[e.code] = true;
});
window.addEventListener('keyup', function (e) {
    keys[e.code] = false;
});

window.addEventListener('resize', function () {
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(window.innerWidth, window.innerHeight);
});

init();
