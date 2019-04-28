ALTER TABLE `prodegot`.`prode` 
ADD COLUMN `pregnant` TINYINT(1) NOT NULL AFTER `bronn_stokeworth`,
ADD COLUMN `completed_list` TINYINT(1) NOT NULL AFTER `pregnant`,
ADD COLUMN `killer` INT(11) NOT NULL AFTER `completed_list`,
ADD COLUMN `iron_throne` INT(11) NOT NULL AFTER `killer`;
