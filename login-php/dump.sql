CREATE DATABASE login;
USE login;

CREATE TABLE `login`.`usuario` (
  `usuario_id` INT NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(200) NOT NULL,
  `senha` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`usuario_id`));

INSERT INTO `usuario` (`usuario_id`,`usuario`,`senha`) VALUES (1,'ricardo','e10adc3949ba59abbe56e057f20f883e');
INSERT INTO `usuario` (`usuario_id`,`usuario`,`senha`) VALUES (10,'usuariotste','81dc9bdb52d04dc20036dbd8313ed055');