// Nicole Yarroch
// January 16, 2015
// Color ball explosion
// Objects and Arrays

class Circle {

  float diameter;
  float xPos;
  float yPos;
  float xDirection;
  float yDirection;
  color circleColor;
  color rectColor;
  color innerRectColor;
  float rotation;

  // The constructor
  Circle() {
    xPos = mouseX;
    yPos = mouseY;
    diameter = random(30, 80);
    xDirection = random(-3, 3);
    yDirection = random(-3, 3);
    circleColor = color(random(255), random(255), random(255));
    rectColor = color(random(255), random(255), random(255));
    innerRectColor = color(random(100, 250), random(100, 200), random(100, 200));
  }

  void drawCircle() {
    fill(circleColor);
    ellipseMode(CENTER);
    rectMode(CENTER);
    ellipse(xPos, yPos, diameter, diameter);
    
    // draw the rectangle
    fill(rectColor);    
    pushMatrix();
    translate(xPos, yPos);
    rotate(radians(frameCount * 2 % 360));
    rect(0, 0, diameter / 2, diameter / 2);
    popMatrix();
    
    // draw the inner rectangle
    fill(innerRectColor);    
    pushMatrix();
    translate(xPos, yPos);
    rotate(-1 * radians(frameCount * 2 % 360));
    rect(0, 0, diameter / 4, diameter / 4);
    popMatrix();
    
  }

  void moveCircle() {
    xPos += xDirection;
    yPos += yDirection;
  }
}

color backgroundColor = #2AD8C0;
ArrayList<Circle> balls; 
int count = 0;
boolean firstMouseClicked = false;

void setup() {
  size(600, 600);
  background(backgroundColor);
  noStroke();
  smooth();
  balls = new ArrayList<Circle>();
  

}

void draw() {
  
  // Draw the background
  background(backgroundColor);

  if (firstMouseClicked == false) {
    // Draw text
    fill(0, 0, 0);
    textSize(30); 
    textAlign(CENTER, CENTER);
    text("CLICK MOUSE ON SCREEN", width / 2, height / 2);
    textSize(20);
    text("Press Enter to Clear Screen", width / 2, (height / 2) + 50); 
  }
  
  // Draw the balls
  for (int i = 0; i < balls.size(); i += 1) {

    // Get a ball object from the array
    Circle ball = balls.get(i);
    
    // Draw the ball
    ball.drawCircle();
    
    // Move the ball
    ball.moveCircle();
   }
}

void mouseDragged() {
  count += 1;
  
  int maxBalls = (int)random(1, 5);
  
  if (count % 10 == 0) {
    // Add more balls to the screen
    for (int i = 0; i < maxBalls; i += 1) {
      Circle ball1 = new Circle();
      balls.add(ball1);
    }
  }
}

void mousePressed() {

  if (firstMouseClicked == false) {
    firstMouseClicked = true;
  }
  
  // Add a random number of balls to the screen
  int maxBalls = (int)random(2, 5);
  
  // Add more balls to the screen
  for (int i = 0; i < maxBalls; i += 1) {
    Circle ball1 = new Circle();
    balls.add(ball1);
  }

  // Generate a random color for the background
  backgroundColor = color(random(255), random(255), random(255));
}

void keyPressed() {
  // Remove all balls if user clicks enter
  if (key == ENTER) {
    balls.clear();
  } 
}

