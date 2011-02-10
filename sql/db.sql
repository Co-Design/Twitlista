CREATE TABLE `Compermisos`.`gente` (
`id` INT( 10 ) NOT NULL COMMENT 'twitter id',
`username` VARCHAR( 64 ) NOT NULL ,
`name` VARCHAR( 512 ) NOT NULL ,
`img_url` VARCHAR( 1024 ) NOT NULL ,
`mun_id` INT( 3 ) NOT NULL COMMENT 'id del municipio',
`timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
`token` VARCHAR( 256 ) NOT NULL ,
`token_secret` VARCHAR( 256 ) NOT NULL ,
PRIMARY KEY ( `id` )
) ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_spanish_ci 
