SET NAMES UTF8;
DROP DATABASE IF EXISTS ty;
CREATE DATABASE ty CHARSET=UTF8;
USE ty;

CREATE TABLE ty_user(
  uid INT PRIMARY KEY AUTO_INCREMENT,
  uname VARCHAR(32),
  upwd VARCHAR(32),
  role VARCHAR(32),
  email VARCHAR(128),
  tel VARCHAR(64)
);
INSERT INTO ty_user VALUES
(1, '卢誉秋', '123456','管理员','770364263@qq.com','18778543910');



CREATE TABLE ty_product(
  pid INT PRIMARY KEY AUTO_INCREMENT,
  tdate VARCHAR(64),
  name VARCHAR(64),
  address VARCHAR(128),
  tag VARCHAR(128),
  detaialed VARCHAR(128)
);
INSERT INTO ty_product VALUES
(1,'2017-03-02','誉秋','碎片科技','过桥费','这是一笔过桥费用'),
(2,'2017-03-18','天宇','空点科技','保护费','这是一笔保护费，交了钱就可以在这里摆摊'),
(3,'2017-04-12','肥仔','罐头天下','再教育费','此人不懂为官之道，这必笔是对他再教育的费用');


