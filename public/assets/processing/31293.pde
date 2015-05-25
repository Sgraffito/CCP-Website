PImage player;
PImage snake;
int px = 4;
int py = 5;
int score = 0;
int time  = 0;
ArrayList<Mob> mobs = new ArrayList<Mob>();
int state = 0;
PImage[] tiles = new PImage[6];
int[] [] map1 = new int[] [] {
  { 1, 1, 1, 0, 1, 1, 1, 1, 1, 1},
  { 1, 1, 0, 0, 0, 0, 0, 0, 5, 2},
  { 1, 5, 0, 0, 5, 0, 0, 0, 0, 2},
  { 1, 5, 0, 0, 0, 5, 0, 0, 5, 2},
  { 1, 1, 1, 1, 0, 0, 2, 2, 0, 2},
  { 1, 1, 0, 0, 0, 0, 2, 5, 0, 2},
  { 1, 1, 5, 1, 0, 0, 2, 2, 2, 2},
  { 1, 1, 1, 1, 0, 0, 2, 5, 2, 2},
  { 1, 5, 0, 0, 0, 0, 0, 0, 2, 2},
  { 2, 2, 2, 2, 2, 2, 2, 2, 2, 2},
}; 
int[] [] map2 = new int[] [] {
  { 2, 2, 2, 2, 2, 2, 2, 2, 2, 2},
  { 1, 1, 0, 0, 0, 0, 0, 0, 5, 2},
  { 1, 5, 0, 0, 5, 0, 0, 0, 0, 2},
  { 1, 5, 0, 0, 0, 5, 0, 0, 5, 2},
  { 1, 0, 0, 0, 0, 0, 0, 0, 0, 2},
  { 1, 1, 0, 0, 0, 0, 2, 5, 0, 2},
  { 1, 1, 5, 1, 0, 0, 2, 2, 2, 2},
  { 1, 1, 1, 1, 0, 0, 1, 5, 2, 2},
  { 1, 5, 0, 0, 0, 0, 0, 0, 2, 2},
  { 1, 1, 1, 1, 0, 1, 1, 1, 1, 1},
}; 

int[][] grid = map1;

void setup() {
  size(640,640);
  tiles[0] = loadImage("assets/processing-image/grass.png");
  tiles[1] = loadImage("assets/processing-image/leftspikes.png");
  tiles[2] = loadImage("assets/processing-image/right.png");
  tiles[5] = loadImage("assets/processing-image/egg.png");
  player   = loadImage("assets/processing-image/bunny.png");
  snake    = loadImage("assets/processing-image/snake.png");
  mobs.add(new Snake(2,3,map1));
  mobs.add(new Snake(4,6,map1));
  mobs.add(new Snake(4,4,map2));
  
}
void draw() {
if (state==0) {
  background(#030303);
  colorMode(HSB);
  fill(random(255), 100, 255);
  textSize(60);
  text("Easter Bunny Swagg!!",20,100);
  textSize(20);
  text("To start playing press the space key and enjoy!",100,300);
  text(" To view instructions press the enter key....",100,400);
  if (keyPressed && key ==' ')   {state = 1;}
  if (keyPressed && key ==ENTER) {state = 2;}
}
  if (state == 1) {
  for(int x=0; x<10; x++) {
    for(int y=0; y<10; y++) {
    image(tiles[grid[y][x]], x*64,y*64);
     }
  }
  image(player,px*64,py*64);
  ArrayList<Mob> deadmobs = new ArrayList<Mob>();
  for(int z = 0; z < mobs.size(); z++) {
    Mob m = mobs.get(z);
    if (m.map == grid) { m.draw(); } 
    if (m.dead) { deadmobs.add(m); }
  }
  mobs.removeAll(deadmobs);
  fill(0,0,0);
  textSize(30);
    text("Eggs: "+score, 10, 20);
    text("Time: "+(int)(time/60)+"seconds", 10, 50);
    time++;
    if (time >= 40*60) { textSize(70); text("Times up...",320,320); delay(2); state = 3;}
  }

if (state == 2) {
    
    fill (0,0,0);
    rect(0,0,640,640);
    colorMode(HSB);
    fill(random(255), 100, 255);
    textSize(55);
    text("INSTRUCTIONS",120,100);
    textSize(15);
    text("1. Use the arrow keys to move the Easter Bunny.",50,200);
    text("2. Pick up the least amount of aster eggs before times up!.",50,250);
    text("3. Do NOT hit the the creepy plants...or else you're dead...",50,300);
    text("4. Kill the Snakes.",50, 350);
    text("5. Press the space key to start playing.", 50,400);
    if (keyPressed && key ==' ')   {state = 1;}
    
    
}
if ( state == 3) {
  fill (0,0,0); 
  rect(0,0, 640,640);
  colorMode(HSB);
  fill(random(255), 100, 255);
  textSize(55);
  text( "You lose!",200, 200);
  textSize(20);
  text( " Better luck next year...",220,400);
  text(" Press the space key to play again", 160,450);
  if (keyPressed && key ==' ')   {state = 0;}
}
}
void keyReleased() {
  if (keyCode== UP)     { move (px, py-1);}
  if (keyCode == DOWN)  {move (px, py+1);}
  if (keyCode== RIGHT)  {move (px+1,py);}
  if (keyCode == LEFT)  {move (px-1,py);}
}
void move(int nx, int ny) {
  for (Mob m : mobs) {if (m.map == grid) { m.move(); } }
  if (grid == map1 && ny < 0) { grid = map2; py = 9; return;}
  if (grid == map2 && ny > 9) { grid = map1; py = 0; return;}
  //for( int z = 0; z < snakes. size(); z++) {
    //snakes.get(z).move();
  
  int t = grid[ny][nx];
  if (t == 1 || t == 2 || t ==  3 || t == 4) {state = 3; return;}
  if (t == 5) {
    grid[ny][nx] = 0;
    score++;
  }
  px = nx;
  py = ny;
  for( int z = 0; z < mobs.size(); z++) {
    //Snake s = mobs.get(z);
    //if (s.px == px && s.py == py) {
      //state = 3; return;
    }
  }

 class Mob {
   int x,y;
   int[][]map;
   boolean dead = false;
   Mob(int mx, int my, int [][] m) {
   x = mx;
   y = my;
   map = m;
 }
 void draw() {}
 void move() {}
 }
 class Snake extends Mob{
   
   Snake(int x, int y,int[][] map) {
     super(x,y,map);
     //px = x;
     //px = y;
   }
   void draw() {
     image(snake, x*64,y*64);
     println("x: " + x + "   " + "y: " + y + "    " + "px: " + px + "  "+ "py: " + py ); 
     if(px == x && py == y && map == grid) {
       dead = true;
       println("HERE");
       mobs.add(new Boom(x,y,map));
     }
 }
   void move() {
     int dir = (int)random(4);
     int nx = x;
     int ny = y;
     if (dir == 0) { ny -= 1;}
     if (dir == 1) { nx += 1;}
     if (dir == 2) { ny += 1;}
     if (dir == 3) { nx -= 1;}
     if (nx < 0 || ny < 0 || nx > 9|| ny > 9) {return;}
     int t = map1 [ny][nx];
     if ( t == 1) { return;}
     if ( t == 2) { return;}
     x = nx;
     y = ny;
     if (  t == 0 && random(1) > 0.2) { map[y][x] = 5; }
 

 }
 }
class Boom extends Mob{
  int timer = 0;
  Boom(int x, int y, int [][] map) {
    super (x,y,map);
  }
  void draw() {
    timer += 1;
    if (timer>20) { dead = true; map[y][x] = 5;}
    colorMode(HSB);
    for(int z = 0; z <10; z++) {
      fill(random(255), 100, 255);
      float size = random(20)+20;
      ellipse(64*x +32 + random(-20,20), 64*y + 32 + random(-20,20), size, size);
    }
  }
}


   

