/****************
  CREATE TABLES
****************/

CREATE TABLE Movie(id int, title varchar(100), year int, rating varchar(10), company varchar(50));
CREATE TABLE Actor(id int, last varchar(20), first varchar(20), sex varchar(6), dob date, dod date);
CREATE TABLE Sales(mid int, ticketsSold int, totalIncome int);
CREATE TABLE Director(id int, last varchar(20), first varchar(20), dob date, dod date);
CREATE TABLE MovieGenre(mid int, genre varchar(20));
CREATE TABLE MovieDirector(mid int, did int);
CREATE TABLE MovieActor(mid int, aid int, role varchar(50));
CREATE TABLE MovieRating(mid int, imdb int, rot int);
CREATE TABLE Review(name varchar(20), time timestamp, mid int, rating int, comment varchar(500));
CREATE TABLE MaxPersonID(id int);
CREATE TABLE MaxMovieID(id int);

/****************************                                                           
  Primary key constraints                                                               
****************************/

-- Every movie has a unique id                                                          
ALTER TABLE Movie ADD PRIMARY KEY (id);

-- Every actor has a unique id                                                          
ALTER TABLE Actor ADD PRIMARY KEY (id);

-- Every director has a unique id                                                       
ALTER TABLE Director ADD PRIMARY KEY (id);

/***************************************                                                
  Referential integrity constraints                                                     
***************************************/

-- MovieActor mid is a reference to Movie id                                            
ALTER TABLE MovieActor
ADD FOREIGN KEY (mid) REFERENCES Movie (id);

-- MovieActor aid is a reference to Actor id                                            
ALTER TABLE MovieActor
ADD FOREIGN KEY (aid) REFERENCES Actor (id);

-- MovieGenre mid is a reference to Movie id                                            
ALTER TABLE MovieGenre
ADD FOREIGN KEY (mid) REFERENCES Movie (id);

-- MovieDirector mid is a reference to Movie id                                         
ALTER TABLE MovieDirector
ADD FOREIGN KEY (mid) REFERENCES Movie (id);

-- Movie Director did is a reference to Director id                                     
ALTER TABLE MovieDirector
ADD FOREIGN KEY (did) REFERENCES Director (id);

-- Movie Rating mid is a reference to Movie id                                          
ALTER TABLE MovieRating
ADD FOREIGN KEY (mid) REFERENCES Movie (id);

-- Sales mid is a reference to Movie id                                                 
ALTER TABLE Sales
ADD FOREIGN KEY (mid) REFERENCES Movie (id);

/**********************                                                                 
  CHECK constraints                                                                     
**********************/

-- tickets sold should not be negative                                                  
ALTER TABLE Sales
ADD CHECK (ticketsSold >= 0);

-- imdb rating must not be negative                                                     
ALTER TABLE MovieRating
ADD CHECK (imdb >= 0);

-- rotten tomatoes rating must not be negative                                          
ALTER TABLE MovieRating
ADD CHECK (rot >= 0);

