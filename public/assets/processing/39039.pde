final int hillHeight = 100;

float[] treeXPos = new float[40];
float[] treeYPos = new float[40];

int treeWidth = 30;
int sledWidth = 30;
float sledXPos = 40;
float sledYPos = hillHeight - sledWidth/2;
float finishLine = 650;
int score = 0;

// Levels
int level = 0;
boolean finishedWithLevel = false;


// Timer
int actualSecs; //actual seconds elapsed since start
int actualMins; //actual minutes elapsed since start
int startSec = 0; //used to reset seconds shown on screen to 0
int startMin = 0; //used to reset minutes shown on screen to 0
int scrnSecs; //seconds displayed on screen (will be 0-60)
int scrnMins = 0 ; //minutes displayed on screen (will be infinite)
int restartSecs = 0; //number of seconds elapsed at last click or 60 sec interval
int restartMins = 0; //number of seconds ellapsed at most recent minute or click
int timer = 0;

PFont myFont;

void setup() {
  size(640, 700);
  rectMode(CENTER);
  // Generate random positions for the trees
  for (int i = 0; i < treeXPos.length; i += 1) {
    treeXPos[i] = random(0, width);
    treeYPos[i] = random(hillHeight, height);
  }
  // Upload the font
  myFont = createFont("GillSans", 32);
}

void draw() {
  
  if (finishedWithLevel) {
   background(#1DE0F0);
   textSize(25);
   textAlign(CENTER, CENTER);
   fill(255);
   text("You finished level " + level + " with " + score + " points", width/2, height / 2);
   fill(0);
   textSize(18);
   text("press ENTER to start", width/2, height/2 + 80);
  }
  else if (level == 0) {
     background(#1DE0F0);
     textSize(80);
     textAlign(CENTER, CENTER);
     fill(255);
     text("SLEDDER", width/2, height / 2);
     fill(0);
     textSize(18);
     text("press ENTER to start", width/2, height/2 + 80);
    }
  
  else if (level == 1) {
   background(255);

   // Draw the sky
   drawSky();
   
   // Draw the trees
   for (int i = 0; i < treeXPos.length; i += 1) {
     drawTree(treeXPos[i], treeYPos[i]);
   }
   
   // Draw the finish line
   drawFinishLine();
   
   // Draw the sled
   drawSled(sledXPos, sledYPos);
   
   // Make sure sled does not go off left edge of screen
   if (sledXPos - sledWidth/2 < 0) {
     sledXPos = sledWidth/2;
   }
   // Make sure sled does not go off right edge of screen
   if (sledXPos + sledWidth/2 > width) {
     sledXPos = width - sledWidth/2;
   }
   
   // Check to see if sled collided with tree
   for (int i = 0; i < treeXPos.length; i += 1) {
      float sledTop = sledYPos - sledWidth/2;
      float sledBottom = sledYPos + sledWidth/2;
      float sledLeft = sledXPos - sledWidth / 2;
      float sledRight = sledXPos + sledWidth / 2;
      float treeTop = treeYPos[i] - treeWidth/2;
      float treeBottom = treeYPos[i] + treeWidth/2;
      float treeLeft = treeXPos[i] - treeWidth/2;
      float treeRight = treeXPos[i] + treeWidth/2;
      
      if (sledTop > treeTop && sledTop < treeBottom && sledLeft > treeLeft && sledLeft < treeRight) {
        score -= 1;
      }
      else if (sledBottom > treeTop && sledBottom < treeBottom && sledLeft > treeLeft && sledLeft < treeRight) {
        score -= 1;
      }
      else if (sledTop > treeTop && sledTop < treeBottom && sledRight > treeLeft && sledRight < treeRight) {
        score -= 1;
      }
      else if (sledBottom > treeTop && sledBottom < treeBottom && sledRight > treeLeft && sledRight < treeRight) {
        score -= 1;;
      }
   }
   
   // Check to see if sled hit bottom of the hill
   if (sledYPos > height - sledWidth / 2) {
     // If it did, stop the sled from moving off the screen
     sledYPos = height - sledWidth / 2;
   }
   // Check to see if sled crossed finish line
   if ((sledYPos + sledWidth/2) > finishLine) {
     score += 10;
     sledXPos = random(sledWidth, width - sledWidth);
     sledYPos = hillHeight - sledWidth/2; 
   }
   
   // Draw the Level and Score
   fill(0);
   textSize(25);
   text("Level: " + level, 500, 30);
   // Draw the score
   text("Score: " + score, 500, 60);  
   // Draw the Timer
   
   // Check the timer
   timer = 30 - actualSecs;
   if (timer == 0) {
     finishedWithLevel = true;
     println("Finished!");
   }
   textFont(myFont);
   textAlign(CENTER, CENTER);
   textSize(60);
   fill(255);
   text ("Time: " + timer, 200, 40);
   
   // Timer
  actualSecs = millis()/1000; //convert milliseconds to seconds, store values.
  actualMins = millis() /1000 / 60; //convert milliseconds to minutes, store values.
  scrnSecs = actualSecs - restartSecs; //seconds to be shown on screen
  scrnMins = actualMins - restartMins; //minutes to be shown on screen
  }
}

void drawSky() {
  fill(#1DE0F0);
  noStroke();
  rect(width / 2, hillHeight / 2, width, hillHeight);
}

void drawTree(float x, float y) {
  fill(#1BE08C);
  noStroke();
  rect(x, y, treeWidth, treeWidth);
  
  // Draw tree trunk
  fill(#F7B82F);
  rect (x, y + 20, 10, 10);
}

void drawFinishLine() {
  strokeWeight(8);
  stroke(#F72F65);
  line(0, finishLine, width, finishLine);
}

void drawSled(float x, float y) {
  noStroke();
  fill(#F72FA4);
  rect(x, y, sledWidth, sledWidth); 
}

void keyPressed() {
  if (level == 0 && key == ENTER) {
    level = 1;
  }
  if (finishedWithLevel && key == ENTER) {
     level = 1;
     timer = 30;
    finishedWithLevel = false; 
  }
  int speed = 10;
   if (keyCode == DOWN) {
     sledYPos += speed;
   }
   if (keyCode == RIGHT) {
     sledXPos += speed;
   }
   if (keyCode == LEFT) {
     sledXPos -= speed;
   }
}
