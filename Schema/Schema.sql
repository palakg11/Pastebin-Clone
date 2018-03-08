CREATE TABLE userinfo (
	Id int(6) unsigned primary key auto_increment,
	Email varchar(40) unique not null,
	Username varchar(40) unique not null,
	Password varchar(40) NOT NULL
	)

CREATE TABLE userpaste (
	
	Date TIMESTAMP,
	Username varchar(40) not null,
	Publicposts varchar(1000) ,
	Privateposts varchar(1000),
	Uniquestring varchar(60) unique
	)