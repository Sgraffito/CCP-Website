// Nicole Yarroch
// Jan 25, 2014

// Global Variables
int numberOfRects;
float[] rectXPos;
float[] rectYPos;
color[] rectColor;
float rectSize;
int grid;
int rectSelected;

void setup() {
  // Set the size of the display window
  size(500, 500);
  
  // Remove all Strokes
  noStroke();
  smooth();

  // Initalize the variables
  numberOfRects = 10;
  grid = 11;
  rectSelected = 8;
  rectXPos = new float[numberOfRects];
  rectYPos = new float[numberOfRects];
  rectSize = width / grid;
  
  // Save the rectangle coordinates into two arrays
  // One array holds the x-pos value; the other y-pos
  // row #1
  rectXPos[0] = rectSize * 5; rectYPos[0] = rectSize * 1; 
  
  // row #2
  rectXPos[1] = rectSize * 4; rectYPos[1] = rectSize * 3; 
  rectXPos[2] = rectSize * 6; rectYPos[2] = rectSize * 3; 
  
  // row #3
  rectXPos[3] = rectSize * 3; rectYPos[3] = rectSize * 5; 
  rectXPos[4] = rectSize * 5; rectYPos[4] = rectSize * 5; 
  rectXPos[5] = rectSize * 7; rectYPos[5] = rectSize * 5; 
  
  // row #4
  rectXPos[6] = rectSize * 2; rectYPos[6] = rectSize * 7; 
  rectXPos[7] = rectSize * 4; rectYPos[7] = rectSize * 7; 
  rectXPos[8] = rectSize * 6; rectYPos[8] = rectSize * 7; 
  rectXPos[9] = rectSize * 8; rectYPos[9] = rectSize * 7; 
}


void draw() {
  // Set the background color of the display windo
  background(#22DEBD);

  drawRects();
}

void drawRects() {
  
  for (int i = 0; i < numberOfRects; i += 1) {
    
    // Color the currently selected rect with pink
    if (rectSelected == i) {
      fill(#F716A5);
    }
    
    // Color all others with yellow
    else {
      fill(#F7F716);
    }
    
    // Draw the rectangle
    rect(rectXPos[i], rectYPos[i], rectSize, rectSize);
  }
}

void mouseClicked() {
  int x = mouseX;
  int y = mouseY;
  
  // Check to see if we have clicked inside a rectangle
  for (int i = 0; i < numberOfRects; i += 1) {
    if (x > rectXPos[i] && x < (rectXPos[i] + rectSize) 
        && y > rectYPos[i] && y < (rectYPos[i] + rectSize)) {
          // If we have, save the index position of the rectangle
        rectSelected = i;
        break;
    }
  } 
}

void mouseDragged() {
 
  rectXPos[rectSelected] = mouseX;
  rectYPos[rectSelected] = mouseY;
  
}
