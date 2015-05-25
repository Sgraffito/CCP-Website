int numberOfCards;
int totalNumberOfCards;
int cardSize;
int cardSpacing;
float[] cardXPos;
float[] cardYPos;

int numberOfColors;
color[] gameColors;

color[] cardColors;
int[] cardMatched;

int nuCardsSelected;
int cardOneIndex;
int cardTwoIndex;

void setup() {
  // Size of display
  size(640, 700); 

  // Drawing properties
  noStroke();

  // Instantiate variables
  numberOfCards = 5;
  totalNumberOfCards = numberOfCards * numberOfCards;
  cardSize = width / (numberOfCards + 2);
  cardSpacing = (width - (cardSize * numberOfCards)) / (numberOfCards + 1);
  nuCardsSelected = 0;

  // Instantiate the array
  numberOfColors = 5;
  gameColors = new color[numberOfColors];
  gameColors[0] = color(#E517CE);  // pink
  gameColors[1] = color(#1794E5);  // blue
  gameColors[2] = color(#E51E1E);  // red
  gameColors[3] = color(#22D151);  // green
  gameColors[4] = color(#F2850F);  // orange

  cardColors = new color[totalNumberOfCards];


  for (int i = 0; i < totalNumberOfCards; i += 1) {
    cardColors[i] = gameColors[(int)random(0, 5)];
  }

  cardXPos = new float[totalNumberOfCards];
  cardYPos = new float[totalNumberOfCards];
  cardMatched = new int[totalNumberOfCards];

  int count = 0;
  for (int i = 0; i < numberOfCards; i += 1) {
    for (int j = 0; j < numberOfCards; j += 1) {
      cardXPos[count] = cardSpacing + i * (cardSize + cardSpacing);
      cardYPos[count] = cardSpacing + j * (cardSize + cardSpacing);

      cardMatched[count] = 0;
      count += 1;
    }
  }
}

void draw() {

  // Background color
  background(#39312A);

  // Draw the card
  drawCard();

  // Check the score
  checkScore();
}

void drawCard() {

  int count = 0;
  for (int i = 0; i < numberOfCards; i += 1) {
    for (int j = 0; j < numberOfCards; j += 1) {

      // They match!
      if (cardMatched[count] == 0) {
        fill(255);
     
     // The two cards don't match
      } else {
        fill(cardColors[count]);
        
      }
      rect(cardXPos[count], cardYPos[count], cardSize, cardSize);
      count += 1;
    }
  }
}

void mouseClicked() {

  // Check to see if user clicked on a card
  for (int i = 0; i < totalNumberOfCards; i += 1) {

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
      mouseY > topBound) 
    {

      cardMatched[i] = 1;
      println("Clicked " + i);

      nuCardsSelected += 1;
      println("Cards selected: " + nuCardsSelected);

      if (nuCardsSelected == 1) {
        cardOneIndex = i;
      } else if (nuCardsSelected == 2) {
        cardTwoIndex = i;
      }
    }
  }
}

void checkScore() {
  if (nuCardsSelected == 2) {
    if (cardColors[cardOneIndex] == cardColors[cardTwoIndex]) {
      println("They match!");
    } else {
      println("no match!");
      cardMatched[cardOneIndex] = 0;
      cardMatched[cardTwoIndex] = 0;
    }

    nuCardsSelected = 0;
  }
}

