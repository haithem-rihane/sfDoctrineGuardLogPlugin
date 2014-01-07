CREATE TABLE user_login_history (id BIGINT AUTO_INCREMENT, ip VARCHAR(16), state VARCHAR(6), user_id BIGINT, created_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE user_login_history ADD CONSTRAINT user_login_history_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id);


ALTER TABLE  `table_name` ADD  `created_by` BIGINT( 20 ) NULL DEFAULT NULL ,
ADD  `updated_by` BIGINT( 20 ) NULL DEFAULT NULL ,
ADD INDEX (  `created_by` ,  `updated_by` );


ALTER TABLE  `table_name` 
ADD FOREIGN KEY (  `created_by` ) REFERENCES  `sf_guard_user` (
`id`
) ON DELETE SET NULL ON UPDATE SET NULL ;

ALTER TABLE  `table_name` 
ADD FOREIGN KEY (  `updated_by` ) REFERENCES  `sf_guard_user` (
`id`
) ON DELETE SET NULL ON UPDATE SET NULL ;