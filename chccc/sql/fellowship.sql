create table ch_group(
	group_id MEDIUMINT NOT NULL AUTO_INCREMENT,
	group_name varchar(50) NOT NULL,
	group_description varchar(1000),
	PRIMARY KEY(group_id)
);

create table ch_group_photo (
	photo_id MEDIUMINT NOT NULL AUTO_INCREMENT,
	photo_path varchar (100) NOT NULL,
	group_id MEDIUMINT  NOT NULL,
	PRIMARY KEY(photo_id)
);