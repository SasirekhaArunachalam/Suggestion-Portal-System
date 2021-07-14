CREATE DATABASE database;
USE database;

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(5) NOT NULL ,
`user_name` varchar(20) NOT NULL ,
`dob` date NOT NULL,
`gender` char(1) NOT NULL,
`email` varchar(50) NOT NULL,
`password` varchar(8) NOT NULL,
 PRIMARY KEY(`user_id`)
)

CREATE TABLE IF NOT EXISTS `poll` (
  `user_id` int(5) NOT NULL  ,
  `qst_id` int(6) NOT NULL,
  `qst` varchar(250) NOT NULL ,
  `opt1` varchar(250) NOT NULL ,
  `opt2` varchar(250) NOT NULL ,
  `opt3` varchar(250) NOT NULL ,
  `opt4` varchar(250) NOT NULL ,
  PRIMARY KEY (`qst_id`)
  FOREIGN KEY (`user_id`) REFERENCES user(`user_id`)
) 

CREATE TABLE IF NOT EXISTS `response` (
`ans_id` int(5) NOT NULL,
`s_id` varchar(50) NOT NULL,
`user_id` int(5) NOT NULL ,
`qst_id` int(6) NOT NULL,
`opt` varchar(250) NOT NULL ,
PRIMARY KEY(`ans_id`),
FOREIGN KEY (`user_id`) REFERENCES user(`user_id`),
FOREIGN KEY (`qst_id`) REFERENCES poll(`qst_id`)

)
