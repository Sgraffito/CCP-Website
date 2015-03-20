int human;
int computer;
boolean turn;
int score;
int scoreHuman;
int scoreComputer;


void setup() {
 size(550, 550); 
 turn = false;
 score = 0;
 scoreHuman = 0;
 scoreComputer = -1;
}

void draw() {
  background(0, 23, 45);
  computerMove();
  drawMove();
  score();
//  println("score is: " + score);
}



void keyPressed() {
  if (key == 'r') {
    human = 1;
    turn = true;
  } 
  else if (key == 'p') {
    human = 2;
    turn = true;
  }
  else if (key == 's') {
    human = 3;
    turn = true;
  }
  else {
    turn = false;
  }
  
}

void computerMove() {
  if (turn == true) {
    computer = (int)random(1, 4);
  }
}

void drawMove() { 
// println("drawing human: " + human + " computer: " + computer); 
  if (human == 1 && computer == 1) {
    drawRock(1); drawRock(2);
  }
  if (human == 1 && computer == 2) {
   drawRock(1); drawPaper(2); 
  }
  if (human == 1 && computer == 3) {
    drawRock(1); drawScissor(2);
  }
  
  if (human == 2 && computer == 1) {
    drawPaper(1); drawRock(2);
  }
  if (human == 2 && computer == 2) {
   drawPaper(1); drawPaper(2); 
  }
  if (human == 2 && computer == 3) {
    drawPaper(1); drawScissor(2);
  }
  
   if (human == 3 && computer == 1) {
    drawScissor(1); drawRock(2);
  }
  if (human == 3 && computer == 2) {
   drawScissor(1); drawPaper(2); 
  }
  if (human == 3 && computer == 3) {
    drawScissor(1); drawScissor(2);
  }
}

void drawScissor(int pos) {
 fill(12, 49, 105);
 if (pos == 1) {
    rect(50, 50, 100, 100);
   
 }
 else {
    rect(200, 50, 100, 100);
   
 }
}

void drawRock(int pos) {
  fill(20, 145, 255);
  if (pos == 1) {
    ellipse(50, 50, 100, 100);
  }
  else {
    ellipse(200, 50, 100, 100);
  }
}

void drawPaper(int pos) {
  fill(255, 45, 255);
  if (pos == 1) {
    rect(50, 50, 100, 100);
  }
  else {
    rect(200, 50, 100, 100);
  }
}

void score() {
  if (turn == true) {
    println("comparing human: " + human + " and computer: " + computer);
    score += 1;
    turn = false;
  }
}
