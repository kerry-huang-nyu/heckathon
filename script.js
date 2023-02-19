const colorInput = document.getElementById('color');
const weight = document.getElementById('weight');
const clear = document.getElementById('clear');
const download = document.getElementById('download');
const paths = [];
let currentPath = [];

function replace(){
    location.replace("fullcode.html");
}

function replaceBack(){
    location.replace("index.php");
}

function setup() {
    createCanvas(window.innerWidth, window.innerHeight);
    background(255);
}

function draw() {
    noFill();
    if(mouseIsPressed){
    const point = {
    x: mouseX,
    y: mouseY,
    color: colorInput.value,
    weight: weight.value
};
currentPath.push(point);
}
paths.forEach(path => {
beginShape();
path.forEach(point => {
stroke(point.color);
strokeWeight(point.weight);
vertex(point.x, point.y);
});
endShape();
});
}

function mousePressed() {
currentPath = [];
paths.push(currentPath);
}

clear.addEventListener('click', () => {
paths.splice(0);
background(255);
});

download.addEventListener('click', () => {
saveCanvas('myCanvas', 'jpg');
print("saving image");
alert("saving image lol");
})
