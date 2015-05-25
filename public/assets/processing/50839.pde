int numberOfCards;         // Number of cards in row & column
int totalCards;            // Total number of cards on the game board
float cardSize;            // Width and height of card (card is square)
float cardSpacing;         // Spacing between the cards

float[] cardXPos;          // x-coordinate of card
float[] cardYPos;          // y-coordinate of card
color[] cardColor;         // color of card

color[] gameColors;        // specific colors for cards
int[] cardMatched;         // tracks whether card is not selected, selected, or matched
int[] cardOpacity;         // opacity of the card, used for flipping the cards

int nuCardsSelected;       // Number of cards that have been selected by the user
int cardOneIndex;          // Index position in array of the first card selected by the user
int cardTwoIndex;          // Index position in array of the second card selected by the user    

int score;                 // The score 
boolean gameOver;          // Game is finished or not

PImage[] cardImages;        // Array of card images

PImage yellowMonster;      // Images for the card
PImage greenMonster;
PImage pinkMonster;
PImage orangeMonster;

// Define constants (a constant value does not change)
// All constants have the word "final" in front of the variable declaration
final int NOT_SELECTED = -1;
final int MATCHED = 1;
final int SELECTED = 2;
final int NO_MATCH = 3;

void setup() {

  // Size of display
  size(640, 700);

  // Set drawing properties
  noStroke();

  // The number of cards in a row
  numberOfCards = 5;      

  // The total number of cards on the board
  totalCards = numberOfCards * numberOfCards;

  /* Card size is calculated by dividing the width of the screen by the number
   * of cards in a row + 2. Adding 2 to the number of cards allows for spacing 
   * between the cards */
  cardSize = width / (numberOfCards + 2);

  /* Spacing between the cards is calculated by subtracting the width of the
   * first row of cards from the width of the screen and then dividing the remainder 
   * of that calculation by the number of gaps between the cards */
  cardSpacing = (width - (cardSize * numberOfCards)) / (numberOfCards + 1);  

  // The number of cards selected initially is zero
  nuCardsSelected = 0;

  // The score is initially zero
  score = 0;

  // The game has just started
  gameOver = false;

  // Load the image 
  yellowMonster = loadImage("yellowMonster.png"); 
  greenMonster = loadImage("greenMonster.png");
  pinkMonster =  loadImage("pinkMonster.png");
  orangeMonster = loadImage("orangeMonster.png");

  // Instantiate the arrays
  cardXPos = new float[totalCards];
  cardYPos = new float[totalCards];
  cardColor = new color[totalCards];
  cardMatched = new int[totalCards];
  cardOpacity = new int[totalCards];

  // Colors to be used in the game
  gameColors = new color[5];
  gameColors[0] = color(#FF0D21);  // Red
  gameColors[1] = color(#3A4EFA);  // Blue
  gameColors[2] = color(#FF972E);  // Orange
  gameColors[3] = color(#53FC2E);  // Green
  gameColors[4] = color(#9D5AD8);  // Purple

  cardImages = new PImage[4];
  cardImages[0] = greenMonster;
  cardImages[1] = yellowMonster;
  cardImages[2] = pinkMonster;
  cardImages[3] = orangeMonster;
  
  /* Calculate the position of the card on the board, and
   * give each card a random color */
  int count = 0;
  for (int i = 0; i < numberOfCards; i += 1) {
    for (int j = 0; j < numberOfCards; j += 1) {

      // Position of card on board
      cardXPos[count] = cardSpacing + i * (cardSize + cardSpacing);
      cardYPos[count] = cardSpacing + j * (cardSize + cardSpacing);

      // Assign a random color to a card
      cardColor[count] = gameColors[(int)random(0, 5)];

      // Card is not matched
      cardMatched[count] = NOT_SELECTED;

      // Set card so it is fully opaque (no transparency)
      cardOpacity[count] = 255;

      count += 1;
    }
  }
}

void draw() {
  // Draw background color
  background(#52D8E8);

  // Game is over
  if (gameOver) {
    fill(0);
    textSize(30); 
    text("Game Over!", width / 2, height / 2);
  } 

  // Draw the game board
  else {

    // Draw the cards
    drawCards();

    // Check the score
    checkScore();

    // Draw the score
    drawScore();

    // Check if game is over
    checkGameOver();
  }
}

void drawCards() {
  // Draw each card
  for (int i = 0; i < totalCards; i += 1) {

    /* The color of the card depends on whether it has
     * been selected, matched, or is unselected */

    // If two cards have been matched, remove them from the board
    if (cardMatched[i] == MATCHED) { 
      fill(cardColor[i], cardOpacity[i]);
      // Reduce the opacity of the card
      cardOpacity[i] -= 0.5;
    }

    // If the card has been selected, show the color 
    else if (cardMatched[i] == SELECTED) {
      fill(cardColor[i]);
    }

    // If the two cards did not match, flip them back over 
    else if (cardMatched[i] == NO_MATCH) {

      // draw a white rectangle behind the card
      fill(255);
      //rect(cardXPos[i], cardYPos[i], cardSize, cardSize);
      image(yellowMonster, cardXPos[i], cardYPos[i], cardSize, cardSize);

      // Draw the card
      fill(cardColor[i], cardOpacity[i]);
      cardOpacity[i] -= 0.5;

      /* Once the card has been flipped, mark it as NOT_SELECTED 
       * and reset the opacity to opaque */
      if (cardOpacity[i] == 0) {
        cardMatched[i] = NOT_SELECTED;
        cardOpacity[i] = 255;
      }
    }

    // The card is not selected, show white background
    else {
      tint(255, 255);

      image(yellowMonster, cardXPos[i], cardYPos[i], cardSize, cardSize);
      fill(255, 255, 255, 0);
    }

    // Draw the card
    rect(cardXPos[i], cardYPos[i], cardSize, cardSize);
  }
}

void mouseClicked() {
  // Check to see if user clicked on a card
  for (int i = 0; i < totalCards; i += 1) {

    // Calculate the top, bottom, left, and right bounds of each card
    float leftBound = cardXPos[i];
    float rightBound = cardXPos[i] + cardSize;
    float topBound = cardYPos[i];
    float bottomBound = cardYPos[i] + cardSize;

    /* Check to see if mouse is between the bounds
     * and that it has not been matched yet */
    if (mouseX < rightBound &&
      mouseX > leftBound && 
      mouseY < bottomBound && 
      mouseY > topBound &&
      cardMatched[i] == NOT_SELECTED) {

      // The card has been selected
      cardMatched[i] = SELECTED;

      // Increase the count of cards selected if there are no cards selected yet
      if (nuCardsSelected == 0) {
        nuCardsSelected += 1;
      }

      // Check to make sure the same card is not getting selected twice
      else if (nuCardsSelected == 1) {
        // If the two cards are not the same, increase the card selected count
        if (cardOneIndex != i) {
          nuCardsSelected += 1;
        }
      }

      // Keep track of the index position of the first card flipped
      if (nuCardsSelected == 1) {
        println("One card flipped");
        cardOneIndex = i;
      }

      // Keep track of the index position of the second card flipped
      if (nuCardsSelected == 2) {
        println("Two cards flipped");
        cardTwoIndex = i;
      }
    }
  }
}

void checkScore() {
  // Check if two cards have been flipped
  if (nuCardsSelected == 2) {

    // The two cards match
    if (cardColor[cardOneIndex] == cardColor[cardTwoIndex]) {
      println("MATCH!"); 

      // Increase score by 5
      score += 5;

      // Cards have been matched
      cardMatched[cardOneIndex] = MATCHED;
      cardMatched[cardTwoIndex] = MATCHED;
    } 

    // The two cards do not match
    else {
      println("NO MATCH!");

      // Decrease score by 2
      score -= 2;

      // Cards have not been matched
      cardMatched[cardOneIndex] = NO_MATCH;
      cardMatched[cardTwoIndex] = NO_MATCH;
    }

    // Reset number of cards flipped to 0
    nuCardsSelected = 0;
  }
}

void drawScore() {
  fill(0);
  textSize(30); 
  text("Score: " + score, width - 150, height - 30);
}

void checkGameOver() {

  int[] cardColorCount = new int[gameColors.length];

  // Initialize the count to zero
  for (int i = 0; i < cardColorCount.length; i += 1) {
    cardColorCount[i] = 0;
  }

  // Count the number of each color card still on the game board
  for (int i = 0; i < totalCards; i += 1) {
    for (int j = 0; j < gameColors.length; j += 1) {

      // Increase count for the color
      if (cardColor[i] == gameColors[j] && cardMatched[i] != 1) {
        cardColorCount[j] += 1;
      }
    }
  }

  // If there are 2 or more cards of any color still left on the board, the game is not over
  for (int i = 0; i < cardColorCount.length; i += 1) {

    // Exit the function if there are 2+ cards of any color still on the board
    if (cardColorCount[i] > 1) {
      return;
    }
  }

  // Game is over
  gameOver = true;
  println("Game is over!");
}

