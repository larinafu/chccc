create table ch_group(
	group_id MEDIUMINT NOT NULL AUTO_INCREMENT,
	group_name varchar(50) NOT NULL,
	group_name_en varchar(50) NOT NULL,
	group_description varchar(1000),
	group_description_en varchar(1000),
	sort_order SMALLINT,
	PRIMARY KEY(group_id)
);

create table ch_group_photo (
	photo_id MEDIUMINT NOT NULL AUTO_INCREMENT,
	photo_path varchar (100) NOT NULL,
	photo_description varchar(1000),
	photo_description_en varchar(1000),
	group_id MEDIUMINT NOT NULL,
	PRIMARY KEY(photo_id)
);