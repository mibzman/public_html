USE cars;
DROP TABLE IF EXISTS friends;

CREATE TABLE friends (
  id INT(11) NOT NULL AUTO_INCREMENT,
  first VARCHAR(20),
  last VARCHAR(20),
  phone INT(11),
  address VARCHAR(40),
  PRIMARY KEY (id)
);

insert into friends values
(1, 'bob', 'jones', 2161234567, '123 e main st.'),
(2, 'tom', 'smith', 2165467896, '432 w 2nd st.');

